<<<<<<< HEAD
/*
 *  Document   : be_pages_generic_contact.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Contact Page
 */

class pageContact {
    /*
     * Init Contact Map functionality
     *
     */
    static contactMap() {
        new GMaps({
            div: '#js-map-contact',
            lat: 37.75755,
            lng: -122.43688,
            zoom: 15,
            disableDefaultUI: true,
            scrollwheel: false
        }).addMarkers([
            {
                lat: 37.75755,
                lng: -122.43688,
                title: 'Marker #1',
                animation: google.maps.Animation.DROP,
                infoWindow: {
                    content: '<strong>Company</strong>'
                }
            }
        ]);
    }

    /*
     * Init functionality
     *
     */
    static init() {
        this.contactMap();
    }
}

// Initialize when page loads
jQuery(() => { pageContact.init(); });
=======
/*
 *  Document   : be_pages_generic_contact.js
 *  Author     : pixelcave
 *  Description: Custom JS code used in Contact Page
 */

class pageContact {
    /*
     * Init Contact Map functionality
     *
     */
    static contactMap() {
        new GMaps({
            div: '#js-map-contact',
            lat: 37.75755,
            lng: -122.43688,
            zoom: 15,
            disableDefaultUI: true,
            scrollwheel: false
        }).addMarkers([
            {
                lat: 37.75755,
                lng: -122.43688,
                title: 'Marker #1',
                animation: google.maps.Animation.DROP,
                infoWindow: {
                    content: '<strong>Company</strong>'
                }
            }
        ]);
    }

    /*
     * Init functionality
     *
     */
    static init() {
        this.contactMap();
    }
}

// Initialize when page loads
jQuery(() => { pageContact.init(); });
>>>>>>> 7d1a9c172eef389cf4f054448f50f53dc0cc1bbb
