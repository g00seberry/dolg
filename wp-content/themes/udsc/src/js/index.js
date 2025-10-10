import { initMaterialTailwind } from "@material-tailwind/html";
import "./consultation-form.js";
import "./test-form.js";
import "./mobile-menu.js";
import "./case-studies-filter.js";
import "./testimonial-form.js";
import "./contact-form.js";

// Initialize all components in your app
initMaterialTailwind();

// Test for auto-reload
console.log("Webpack watch is working! Time:", new Date().toLocaleTimeString());
