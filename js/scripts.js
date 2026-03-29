/*!
* Start Bootstrap - Agency v7.0.12 (https://startbootstrap.com/theme/agency)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-agency/blob/master/LICENSE)
*/
//
// Scripts
// 

window.addEventListener('DOMContentLoaded', event => {

    // Navbar shrink function
    var navbarShrink = function () {
        const navbarCollapsible = document.body.querySelector('#mainNav');
        if (!navbarCollapsible) {
            return;
        }
        if (window.scrollY === 0) {
            navbarCollapsible.classList.remove('navbar-shrink')
        } else {
            navbarCollapsible.classList.add('navbar-shrink')
        }

    };

    // Shrink the navbar 
    navbarShrink();

    // Shrink the navbar when page is scrolled
    document.addEventListener('scroll', navbarShrink);

    //  Activate Bootstrap scrollspy on the main nav element
    const mainNav = document.body.querySelector('#mainNav');
    if (mainNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#mainNav',
            rootMargin: '0px 0px -40%',
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

    // Function to add months to a date
    function addMonths(dateStr, months) {
        if (!dateStr) return '';
        const date = new Date(dateStr);
        date.setMonth(date.getMonth() + months);
        return date.toISOString().split('T')[0];
    }

    // Event listeners for date calculations
    document.getElementById('thongbao_ht1').addEventListener('change', function() {
        document.getElementById('deadline_ht1').value = addMonths(this.value, 2);
    });
    document.getElementById('giahan_ht1').addEventListener('change', function() {
        document.getElementById('deadline_gh1').value = addMonths(this.value, 4);
    });
    document.getElementById('thongbao_nd1').addEventListener('change', function() {
        document.getElementById('deadline_nd1').value = addMonths(this.value, 3);
    });
    document.getElementById('giahan_nd1').addEventListener('change', function() {
        document.getElementById('deadline_gh_nd1').value = addMonths(this.value, 6);
    });
    document.getElementById('chapnhan_cb').addEventListener('change', function() {
        document.getElementById('deadline_nop_phi1').value = addMonths(this.value, 3);
    });
    document.getElementById('giahan_nop_phi').addEventListener('change', function() {
        document.getElementById('deadline_nop_phi2').value = addMonths(this.value, 6);
    });

});
