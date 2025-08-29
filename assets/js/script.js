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
   * SlideFire Navbar Handler
   */
  class SlidefireNavbar {
    constructor(element) {
      this.element = element
      this.mobileMenuBtn = element.querySelector('[data-mobile-menu-toggle]')
      this.mobileNav = element.querySelector('[data-mobile-nav]')
      this.dropdownTriggers = element.querySelectorAll('[data-dropdown-toggle]')
      this.isMenuOpen = false
      this.activeDropdown = null

      this.init()
    }

    init() {
      if (!this.element) return

      this.setupMobileMenu()
      this.setupDropdowns()
      this.setupInstagramAnimation()
      this.setupScrollEffect()
      this.setupAccessibility()
    }

    setupMobileMenu() {
      if (!this.mobileMenuBtn || !this.mobileNav) return

      this.mobileMenuBtn.addEventListener('click', (e) => {
        e.preventDefault()
        this.toggleMobileMenu()
      })

      // Close mobile menu when clicking outside
      document.addEventListener('click', (e) => {
        if (this.isMenuOpen && !this.element.contains(e.target)) {
          this.closeMobileMenu()
        }
      })

      // Close mobile menu on escape key
      document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && this.isMenuOpen) {
          this.closeMobileMenu()
        }
      })

      // Close mobile menu on window resize to desktop
      window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && this.isMenuOpen) {
          this.closeMobileMenu()
        }
      })
    }

    toggleMobileMenu() {
      if (this.isMenuOpen) {
        this.closeMobileMenu()
      } else {
        this.openMobileMenu()
      }
    }

    openMobileMenu() {
      this.isMenuOpen = true
      this.mobileNav.setAttribute('data-open', 'true')
      this.mobileMenuBtn.setAttribute('aria-expanded', 'true')
      document.body.style.overflow = 'hidden' // Prevent body scroll

      // Update mobile menu button icon to close
      const icon = this.mobileMenuBtn.querySelector('.navbar-mobile-menu-icon')
      if (icon) {
        icon.innerHTML = `
          <path d="M18 6 6 18"></path>
          <path d="m6 6 12 12"></path>
        `
      }
    }

    closeMobileMenu() {
      this.isMenuOpen = false
      this.mobileNav.setAttribute('data-open', 'false')
      this.mobileMenuBtn.setAttribute('aria-expanded', 'false')
      document.body.style.overflow = ''

      // Update mobile menu button icon to hamburger
      const icon = this.mobileMenuBtn.querySelector('.navbar-mobile-menu-icon')
      if (icon) {
        icon.innerHTML = `
          <line x1="3" y1="6" x2="21" y2="6"></line>
          <line x1="3" y1="12" x2="21" y2="12"></line>
          <line x1="3" y1="18" x2="21" y2="18"></line>
        `
      }
    }

    setupDropdowns() {
      this.dropdownTriggers.forEach(trigger => {
        const dropdownId = trigger.getAttribute('data-dropdown-toggle')
        const dropdown = this.element.querySelector(`#${dropdownId}`)
        const parentDropdown = trigger.closest('.navbar-dropdown')

        if (!dropdown || !parentDropdown) return

        // Toggle dropdown on click
        trigger.addEventListener('click', (e) => {
          e.preventDefault()
          this.toggleDropdown(parentDropdown, dropdown)
        })

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
          if (!parentDropdown.contains(e.target)) {
            this.closeDropdown(parentDropdown, dropdown)
          }
        })

        // Close dropdown on escape key
        trigger.addEventListener('keydown', (e) => {
          if (e.key === 'Escape') {
            this.closeDropdown(parentDropdown, dropdown)
            trigger.focus()
          }
        })
      })
    }

    toggleDropdown(parentDropdown, dropdown) {
      const isOpen = parentDropdown.getAttribute('data-open') === 'true'

      // Close all other dropdowns
      this.closeAllDropdowns()

      if (!isOpen) {
        this.openDropdown(parentDropdown, dropdown)
      }
    }

    openDropdown(parentDropdown, dropdown) {
      parentDropdown.setAttribute('data-open', 'true')
      this.activeDropdown = { parent: parentDropdown, menu: dropdown }
    }

    closeDropdown(parentDropdown, dropdown) {
      parentDropdown.setAttribute('data-open', 'false')
      if (this.activeDropdown && this.activeDropdown.parent === parentDropdown) {
        this.activeDropdown = null
      }
    }

    closeAllDropdowns() {
      this.dropdownTriggers.forEach(trigger => {
        const dropdownId = trigger.getAttribute('data-dropdown-toggle')
        const dropdown = this.element.querySelector(`#${dropdownId}`)
        const parentDropdown = trigger.closest('.navbar-dropdown')

        if (parentDropdown && dropdown) {
          this.closeDropdown(parentDropdown, dropdown)
        }
      })
    }

    setupInstagramAnimation() {
      const instagramLink = this.element.querySelector('.navbar-instagram-link')
      if (!instagramLink) return

      // Add pulse animation to Instagram link periodically
      setInterval(() => {
        if (!instagramLink.matches(':hover')) {
          instagramLink.style.animation = 'instagram-pulse 0.6s ease-in-out'
          setTimeout(() => {
            instagramLink.style.animation = ''
          }, 600)
        }
      }, 8000)
    }

    setupScrollEffect() {
      const header = this.element.querySelector('.slidefire-navbar-header')
      if (!header) return

      let lastScrollY = window.scrollY
      let ticking = false

      const updateHeaderOnScroll = () => {
        const scrollY = window.scrollY

        if (scrollY > 100) {
          header.style.backgroundColor = 'rgba(0, 0, 0, 0.95)'
          header.style.backdropFilter = 'blur(20px)'
        } else {
          header.style.backgroundColor = 'rgba(0, 0, 0, 0.8)'
          header.style.backdropFilter = 'blur(12px)'
        }

        lastScrollY = scrollY
        ticking = false
      }

      const requestUpdate = () => {
        if (!ticking) {
          requestAnimationFrame(updateHeaderOnScroll)
          ticking = true
        }
      }

      window.addEventListener('scroll', requestUpdate, { passive: true })
    }

    setupAccessibility() {
      // Enhance keyboard navigation for dropdown menus
      this.dropdownTriggers.forEach(trigger => {
        const dropdownId = trigger.getAttribute('data-dropdown-toggle')
        const dropdown = this.element.querySelector(`#${dropdownId}`)
        const parentDropdown = trigger.closest('.navbar-dropdown')

        if (!dropdown || !parentDropdown) return

        // Handle arrow key navigation in dropdowns
        dropdown.addEventListener('keydown', (e) => {
          const items = dropdown.querySelectorAll('.navbar-dropdown-item')
          const currentIndex = Array.from(items).indexOf(document.activeElement)

          switch (e.key) {
            case 'ArrowDown':
              e.preventDefault()
              const nextIndex = currentIndex < items.length - 1 ? currentIndex + 1 : 0
              items[nextIndex].focus()
              break
            case 'ArrowUp':
              e.preventDefault()
              const prevIndex = currentIndex > 0 ? currentIndex - 1 : items.length - 1
              items[prevIndex].focus()
              break
            case 'Home':
              e.preventDefault()
              items[0].focus()
              break
            case 'End':
              e.preventDefault()
              items[items.length - 1].focus()
              break
          }
        })
      })

      // Add skip link for accessibility
      this.addSkipLink()
    }

    addSkipLink() {
      const skipLink = document.createElement('a')
      skipLink.href = '#main-content'
      skipLink.textContent = 'Skip to main content'
      skipLink.className = 'navbar-skip-link'
      skipLink.style.cssText = `
        position: absolute;
        top: -40px;
        left: 6px;
        background: var(--slidefire-primary);
        color: var(--slidefire-primary-foreground);
        padding: 8px;
        text-decoration: none;
        border-radius: 4px;
        z-index: 1000;
        transition: top 0.3s ease;
      `

      skipLink.addEventListener('focus', () => {
        skipLink.style.top = '6px'
      })

      skipLink.addEventListener('blur', () => {
        skipLink.style.top = '-40px'
      })

      this.element.insertBefore(skipLink, this.element.firstChild)
    }

    // Public methods
    openMobileMenuExternal() {
      this.openMobileMenu()
    }

    closeMobileMenuExternal() {
      this.closeMobileMenu()
    }

    closeAllDropdownsExternal() {
      this.closeAllDropdowns()
    }
  }

  /**
   * Initialize navbar widgets
   */
  function initSlidefireNavbarWidgets() {
    const navbars = document.querySelectorAll('.slidefire-navbar')

    navbars.forEach(navbar => {
      if (!navbar.hasAttribute('data-navbar-initialized')) {
        new SlidefireNavbar(navbar)
        navbar.setAttribute('data-navbar-initialized', 'true')
      }
    })
  }

  /**
   * Add Instagram pulse animation keyframes
   */
  const instagramAnimationStyle = document.createElement('style')
  instagramAnimationStyle.textContent = `
    @keyframes instagram-pulse {
      0% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.05);
      }
      100% {
        transform: scale(1);
      }
    }
  `
  document.head.appendChild(instagramAnimationStyle)

  /**
   * Initialize navbar widgets when DOM is ready
   */
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initSlidefireNavbarWidgets)
  } else {
    initSlidefireNavbarWidgets()
  }

  /**
   * Re-initialize for Elementor editor
   */
  if (typeof elementorFrontend !== 'undefined') {
    elementorFrontend.hooks.addAction(
      'frontend/element_ready/slidefire_navbar.default',
      function ($scope) {
        const navbar = $scope[0].querySelector('.slidefire-navbar')
        if (navbar && !navbar.hasAttribute('data-navbar-initialized')) {
          new SlidefireNavbar(navbar)
          navbar.setAttribute('data-navbar-initialized', 'true')
        }
      }
    )
  }

  /**
   * Expose to global scope for external access
   */
  window.SlidefireCategoryNavigation = SlidefireCategoryNavigation
  window.SlidefireNavbar = SlidefireNavbar
})(jQuery)
