/**
 * Holiday Theme Controller
 * Auto-enables December 1-31 with manual override capability
 *
 * Usage:
 *   HolidayTheme.enable()   - Force enable
 *   HolidayTheme.disable()  - Force disable
 *   HolidayTheme.reset()    - Reset to auto-detection
 *   HolidayTheme.status()   - Check current status
 */

(function() {
  'use strict';

  // ========== CONFIGURATION ==========
  const HOLIDAY_CONFIG = {
    startMonth: 11,  // December (0-indexed: Jan=0, Dec=11)
    startDay: 1,
    endDay: 31,

    // Manual override storage key
    storageKey: 'holidayThemeOverride',

    // Feature flags
    enableAutoToggle: true,
    enableAnimations: true,
    enableColorOverrides: true
  };

  // ========== DATE DETECTION ==========
  /**
   * Check if current date is within holiday period (Dec 1-31)
   */
  function isHolidayPeriod() {
    const now = new Date();
    const month = now.getMonth();  // 0-11
    const day = now.getDate();     // 1-31

    return month === HOLIDAY_CONFIG.startMonth &&
           day >= HOLIDAY_CONFIG.startDay &&
           day <= HOLIDAY_CONFIG.endDay;
  }

  // ========== MANUAL OVERRIDE MANAGEMENT ==========
  /**
   * Get manual override setting from localStorage
   * @returns {boolean|null} true=enabled, false=disabled, null=no override
   */
  function getManualOverride() {
    try {
      const override = localStorage.getItem(HOLIDAY_CONFIG.storageKey);
      if (override === 'enabled') return true;
      if (override === 'disabled') return false;
      return null; // No override set
    } catch (e) {
      // localStorage might be blocked
      console.warn('Holiday theme: localStorage not available');
      return null;
    }
  }

  /**
   * Set manual override in localStorage
   * @param {boolean|null} enabled - true=enable, false=disable, null=clear
   */
  function setManualOverride(enabled) {
    try {
      if (enabled === null) {
        localStorage.removeItem(HOLIDAY_CONFIG.storageKey);
      } else {
        localStorage.setItem(
          HOLIDAY_CONFIG.storageKey,
          enabled ? 'enabled' : 'disabled'
        );
      }
    } catch (e) {
      console.warn('Holiday theme: Unable to save override setting');
    }
  }

  // ========== THEME ACTIVATION LOGIC ==========
  /**
   * Determine if holiday theme should be enabled
   * @returns {boolean}
   */
  function shouldEnableHoliday() {
    const manualOverride = getManualOverride();

    // Manual override takes precedence
    if (manualOverride !== null) {
      return manualOverride;
    }

    // Auto-detection based on date
    if (HOLIDAY_CONFIG.enableAutoToggle) {
      return isHolidayPeriod();
    }

    return false;
  }

  /**
   * Enable the holiday theme
   */
  function enableHolidayTheme() {
    // Show banner with fade-in effect
    const banner = document.getElementById('holiday-banner');
    if (banner) {
      banner.style.display = 'block';
      banner.style.opacity = '0';
      banner.style.transition = 'opacity 0.5s ease-in';

      // Trigger fade-in after a brief delay
      setTimeout(function() {
        banner.style.opacity = '1';
      }, 100);
    }

    // Add holiday mode class to body for color overrides
    if (HOLIDAY_CONFIG.enableColorOverrides) {
      document.body.classList.add('holiday-mode');
    }

    console.log('🎄 Holiday theme enabled!');
  }

  /**
   * Disable the holiday theme
   */
  function disableHolidayTheme() {
    const banner = document.getElementById('holiday-banner');
    if (banner) {
      banner.style.display = 'none';
    }

    document.body.classList.remove('holiday-mode');
    console.log('Holiday theme disabled.');
  }

  // ========== SNOWFLAKE GENERATION ==========
  /**
   * Dynamically create snowflake elements
   */
  function createSnowflakes() {
    if (!HOLIDAY_CONFIG.enableAnimations) return;

    const container = document.querySelector('.snowflakes');
    if (!container) return;

    // Clear existing snowflakes
    container.innerHTML = '';

    // Adjust count based on screen size
    const snowflakeCount = window.innerWidth < 768 ? 6 : 8;
    const symbols = ['❄', '❅', '❆'];

    for (let i = 0; i < snowflakeCount; i++) {
      const snowflake = document.createElement('div');
      snowflake.className = 'snowflake';
      snowflake.textContent = symbols[Math.floor(Math.random() * symbols.length)];
      snowflake.setAttribute('aria-hidden', 'true');

      // Random positioning and timing handled by CSS nth-child selectors
      container.appendChild(snowflake);
    }
  }

  // ========== INITIALIZATION ==========
  /**
   * Initialize the holiday theme controller
   */
  function init() {
    // Wait for DOM to be ready
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', init);
      return;
    }

    console.log('Holiday Theme Script Initialized');
    console.log('Current date check:', isHolidayPeriod() ? 'In holiday period (Dec 1-31)' : 'Outside holiday period');

    // Create snowflakes
    createSnowflakes();

    // Enable or disable theme based on date/override
    if (shouldEnableHoliday()) {
      enableHolidayTheme();
    } else {
      disableHolidayTheme();
    }

    // Recreate snowflakes on window resize (debounced)
    let resizeTimeout;
    window.addEventListener('resize', function() {
      clearTimeout(resizeTimeout);
      resizeTimeout = setTimeout(function() {
        if (shouldEnableHoliday()) {
          createSnowflakes();
        }
      }, 250);
    });
  }

  // ========== PUBLIC API ==========
  /**
   * Expose public API for manual control
   */
  window.HolidayTheme = {
    /**
     * Force enable the holiday theme
     */
    enable: function() {
      setManualOverride(true);
      createSnowflakes();
      enableHolidayTheme();
      console.log('Holiday theme manually enabled');
    },

    /**
     * Force disable the holiday theme
     */
    disable: function() {
      setManualOverride(false);
      disableHolidayTheme();
      console.log('Holiday theme manually disabled');
    },

    /**
     * Reset to automatic date-based detection
     */
    reset: function() {
      setManualOverride(null);
      console.log('Holiday theme reset to auto-detection');
      init();
    },

    /**
     * Get current theme status
     * @returns {Object} Status information
     */
    status: function() {
      return {
        enabled: document.body.classList.contains('holiday-mode'),
        bannerVisible: document.getElementById('holiday-banner')?.style.display !== 'none',
        inPeriod: isHolidayPeriod(),
        manualOverride: getManualOverride(),
        currentDate: new Date().toLocaleDateString()
      };
    }
  };

  // Start initialization
  init();

})();
