import '../sass/web-pages.scss';

import AOS from 'aos';
import GLightbox from 'glightbox';
import Isotope from 'isotope-layout';
import Swiper from 'swiper/bundle';
import toastr from 'toastr';
import 'waypoints/lib/noframework.waypoints.js';

// Import the initialize function from the separate file
import { initialize } from '../../public/assets/js/main.js';

AOS.init();
window.AOS = AOS;
window.GLightbox = GLightbox;
window.Isotope = Isotope;
window.Swiper = Swiper;
window.toastr = toastr;

initialize();