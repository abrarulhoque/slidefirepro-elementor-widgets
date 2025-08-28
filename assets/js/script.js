/**
 * SlideFire Category Widget JavaScript
 * Handles mobile swipe/touch functionality and smooth scrolling
 */

;(function ($) {
  'use strict'

  /**
   * SlideFire Category Navigation Handler
   */
  class SlidefireCategoryNavigation {
    constructor (element) {
      this.element = element
      this.wrapper = element.querySelector('.category-items-wrapper')
      this.items = element.querySelectorAll('.category-item')
      this.isMobile = window.innerWidth < 768
      this.isScrolling = false
      this.startX = 0
      this.scrollLeft = 0
      this.velocity = 0
      this.momentum = 0
      this.lastTime = 0
      this.lastX = 0

      this.init()
    }

    init () {
      if (!this.wrapper || !this.items.length) {
        return
      }

      this.setupMobileScroll()
      this.setupResizeHandler()
      this.setupAccessibility()
    }

    setupMobileScroll () {
      if (!this.isMobile) {
        return
      }

      // Touch events
      this.wrapper.addEventListener(
        'touchstart',
        this.handleTouchStart.bind(this),
        { passive: false }
      )
      this.wrapper.addEventListener(
        'touchmove',
        this.handleTouchMove.bind(this),
        { passive: false }
      )
      this.wrapper.addEventListener(
        'touchend',
        this.handleTouchEnd.bind(this),
        { passive: true }
      )

      // Mouse events for desktop testing
      this.wrapper.addEventListener(
        'mousedown',
        this.handleMouseDown.bind(this)
      )
      this.wrapper.addEventListener(
        'mousemove',
        this.handleMouseMove.bind(this)
      )
      this.wrapper.addEventListener('mouseup', this.handleMouseUp.bind(this))
      this.wrapper.addEventListener('mouseleave', this.handleMouseUp.bind(this))

      // Prevent context menu on long press
      this.wrapper.addEventListener('contextmenu', e => {
        if (this.isScrolling) {
          e.preventDefault()
        }
      })
    }

    handleTouchStart (e) {
      this.startTouch(e.touches[0].clientX, e.timeStamp)
    }

    handleTouchMove (e) {
      if (!this.isScrolling) return

      e.preventDefault()
      this.moveTouch(e.touches[0].clientX, e.timeStamp)
    }

    handleTouchEnd (e) {
      this.endTouch()
    }

    handleMouseDown (e) {
      e.preventDefault()
      this.startTouch(e.clientX, e.timeStamp)

      // Add mouse move listener only when mouse is down
      document.addEventListener('mousemove', this.handleMouseMove.bind(this))
      document.addEventListener('mouseup', this.handleMouseUp.bind(this))
    }

    handleMouseMove (e) {
      if (!this.isScrolling) return

      e.preventDefault()
      this.moveTouch(e.clientX, e.timeStamp)
    }

    handleMouseUp (e) {
      this.endTouch()

      // Remove global mouse listeners
      document.removeEventListener('mousemove', this.handleMouseMove.bind(this))
      document.removeEventListener('mouseup', this.handleMouseUp.bind(this))
    }

    startTouch (clientX, timeStamp) {
      this.isScrolling = true
      this.startX = clientX
      this.scrollLeft = this.wrapper.scrollLeft
      this.velocity = 0
      this.lastTime = timeStamp
      this.lastX = clientX

      // Add grabbing cursor
      this.wrapper.style.cursor = 'grabbing'
      this.wrapper.style.userSelect = 'none'
    }

    moveTouch (clientX, timeStamp) {
      const deltaX = this.startX - clientX
      const deltaTime = timeStamp - this.lastTime

      // Calculate velocity for momentum scrolling
      if (deltaTime > 0) {
        this.velocity = (clientX - this.lastX) / deltaTime
      }

      this.wrapper.scrollLeft = this.scrollLeft + deltaX

      this.lastTime = timeStamp
      this.lastX = clientX
    }

    endTouch () {
      this.isScrolling = false

      // Remove grabbing cursor
      this.wrapper.style.cursor = ''
      this.wrapper.style.userSelect = ''

      // Apply momentum scrolling
      this.applyMomentum()
    }

    applyMomentum () {
      if (Math.abs(this.velocity) < 0.1) {
        return
      }

      const friction = 0.95
      const threshold = 0.05

      const animate = () => {
        this.velocity *= friction

        if (Math.abs(this.velocity) > threshold) {
          this.wrapper.scrollLeft -= this.velocity * 16 // 16ms per frame
          requestAnimationFrame(animate)
        } else {
          this.snapToItem()
        }
      }

      requestAnimationFrame(animate)
    }

    snapToItem () {
      if (!this.isMobile) return

      const itemWidth = this.items[0].offsetWidth + 32 // item width + gap
      const scrollLeft = this.wrapper.scrollLeft
      const targetIndex = Math.round(scrollLeft / itemWidth)
      const targetScroll = targetIndex * itemWidth

      this.wrapper.scrollTo({
        left: targetScroll,
        behavior: 'smooth'
      })
    }

    setupResizeHandler () {
      let resizeTimeout

      window.addEventListener('resize', () => {
        clearTimeout(resizeTimeout)
        resizeTimeout = setTimeout(() => {
          this.isMobile = window.innerWidth < 768

          if (this.isMobile) {
            this.setupMobileScroll()
          }
        }, 250)
      })
    }

    setupAccessibility () {
      // Add keyboard navigation
      this.items.forEach((item, index) => {
        item.addEventListener('keydown', e => {
          switch (e.key) {
            case 'ArrowLeft':
              e.preventDefault()
              this.focusPreviousItem(index)
              break
            case 'ArrowRight':
              e.preventDefault()
              this.focusNextItem(index)
              break
            case 'Home':
              e.preventDefault()
              this.focusFirstItem()
              break
            case 'End':
              e.preventDefault()
              this.focusLastItem()
              break
          }
        })
      })
    }

    focusPreviousItem (currentIndex) {
      const prevIndex = Math.max(0, currentIndex - 1)
      this.focusItem(prevIndex)
    }

    focusNextItem (currentIndex) {
      const nextIndex = Math.min(this.items.length - 1, currentIndex + 1)
      this.focusItem(nextIndex)
    }

    focusFirstItem () {
      this.focusItem(0)
    }

    focusLastItem () {
      this.focusItem(this.items.length - 1)
    }

    focusItem (index) {
      const item = this.items[index]
      if (item) {
        item.focus()

        // Scroll item into view on mobile
        if (this.isMobile) {
          const itemRect = item.getBoundingClientRect()
          const wrapperRect = this.wrapper.getBoundingClientRect()

          if (
            itemRect.left < wrapperRect.left ||
            itemRect.right > wrapperRect.right
          ) {
            item.scrollIntoView({
              behavior: 'smooth',
              block: 'nearest',
              inline: 'center'
            })
          }
        }
      }
    }

    // Public method to scroll to specific item
    scrollToItem (index) {
      if (index >= 0 && index < this.items.length) {
        this.items[index].scrollIntoView({
          behavior: 'smooth',
          block: 'nearest',
          inline: 'center'
        })
      }
    }

    // Public method to get current visible items (useful for pagination indicators)
    getVisibleItems () {
      if (!this.isMobile) {
        return Array.from(this.items)
      }

      const wrapperRect = this.wrapper.getBoundingClientRect()
      return Array.from(this.items).filter(item => {
        const itemRect = item.getBoundingClientRect()
        return (
          itemRect.left >= wrapperRect.left &&
          itemRect.right <= wrapperRect.right
        )
      })
    }
  }

  /**
   * Initialize widget when DOM is ready
   */
  function initSlidefireCategoryWidgets () {
    const widgets = document.querySelectorAll('.slidefire-category-navigation')

    widgets.forEach(widget => {
      // Check if already initialized
      if (!widget.hasAttribute('data-slidefire-initialized')) {
        new SlidefireCategoryNavigation(widget)
        widget.setAttribute('data-slidefire-initialized', 'true')
      }
    })
  }

  /**
   * Initialize on DOM ready
   */
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSlidefireCategoryWidgets)
  } else {
    initSlidefireCategoryWidgets()
  }

  /**
   * Re-initialize when new content is loaded (for Elementor editor)
   */
  if (typeof elementorFrontend !== 'undefined') {
    elementorFrontend.hooks.addAction(
      'frontend/element_ready/slidefire_category_navigation.default',
      function ($scope) {
        const widget = $scope[0].querySelector('.slidefire-category-navigation')
        if (widget && !widget.hasAttribute('data-slidefire-initialized')) {
          new SlidefireCategoryNavigation(widget)
          widget.setAttribute('data-slidefire-initialized', 'true')
        }
      }
    )
  }

  /**
   * Expose to global scope for external access
   */
  window.SlidefireCategoryNavigation = SlidefireCategoryNavigation
})(jQuery)
