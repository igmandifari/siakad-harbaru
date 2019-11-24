<<<<<<< HEAD
/*
 *  Document   : tools.js
 *  Author     : pixelcave
 *  Description: Various small tools
 *
 */

// Import global dependencies
import './../bootstrap';

// Tools
export default class Tools {
    /*
     * Updates the color theme
     *
     */
    static updateTheme(themeEl, themeName) {
        if (themeName === 'default') {
            if (themeEl.length) {
                themeEl.remove();
            }
        } else {
            if (themeEl.length) {
                themeEl.attr('href', themeName);
            } else {
                jQuery('#css-main')
                    .after('<link rel="stylesheet" id="css-theme" href="' + themeName + '">');
            }
        }
    }

    /*
     * Returns current browser's window width
     *
     */
    static getWidth() {
        return window.innerWidth
            || document.documentElement.clientWidth
            || document.body.clientWidth;
    }
=======
/*
 *  Document   : tools.js
 *  Author     : pixelcave
 *  Description: Various small tools
 *
 */

// Import global dependencies
import './../bootstrap';

// Tools
export default class Tools {
    /*
     * Updates the color theme
     *
     */
    static updateTheme(themeEl, themeName) {
        if (themeName === 'default') {
            if (themeEl.length) {
                themeEl.remove();
            }
        } else {
            if (themeEl.length) {
                themeEl.attr('href', themeName);
            } else {
                jQuery('#css-main')
                    .after('<link rel="stylesheet" id="css-theme" href="' + themeName + '">');
            }
        }
    }

    /*
     * Returns current browser's window width
     *
     */
    static getWidth() {
        return window.innerWidth
            || document.documentElement.clientWidth
            || document.body.clientWidth;
    }
>>>>>>> 7d1a9c172eef389cf4f054448f50f53dc0cc1bbb
}