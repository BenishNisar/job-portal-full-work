// document.addEventListener("DOMContentLoaded", function () {
//     // 1. Modal Initialization (Aik hi baar pure project ke liye)
//     const modalElement = document.getElementById('applyModal');
//     if (!modalElement) return; // Agar page par modal nahi hai to aage kuch na karo

//     const applyModal = new bootstrap.Modal(modalElement);

//     // 2. Global Elements (Common for both pages)
//     const applicationForm = document.getElementById('applicationForm');
//     const fileInput = document.getElementById('cvFile');
//     const fileNameDisplay = document.getElementById('fileNameDisplay');

//     // --- JOBS PAGE LOGIC (Filters & Card Buttons) ---
//     const jobCards = document.querySelectorAll('.job-card-item');
//     if (jobCards.length > 0) {
//         const checkboxes = document.querySelectorAll('.filter-checkbox');
//         const salaryRange = document.getElementById('salaryRange');
//         const salaryValue = document.getElementById('salaryValue');
//         const noJobsMessage = document.getElementById('noJobsMessage');
//         const clearBtn = document.getElementById('clearAllBtn');
//         const searchInput = document.getElementById('jobSearchInput');

//         function filterJobs() {
//             let activeTypes = Array.from(checkboxes).filter(i => i.checked && ["full-time", "part-time", "remote"].includes(i.value)).map(i => i.value);
//             let activeLevels = Array.from(checkboxes).filter(i => i.checked && ["entry", "mid", "senior"].includes(i.value)).map(i => i.value);
//             let minSalary = parseInt(salaryRange?.value) || 0;
//             let searchText = (searchInput?.value || "").toLowerCase();
//             let visibleCount = 0;

//             jobCards.forEach(card => {
//                 let type = card.getAttribute('data-type');
//                 let level = card.getAttribute('data-level');
//                 let salary = parseInt(card.getAttribute('data-salary'));
//                 let title = card.getAttribute('data-title').toLowerCase();

//                 let typeMatch = (activeTypes.length === 0 || activeTypes.includes(type));
//                 let levelMatch = (activeLevels.length === 0 || activeLevels.includes(level));
//                 let salaryMatch = (salary >= minSalary);
//                 let searchMatch = (title.includes(searchText));

//                 if (typeMatch && levelMatch && salaryMatch && searchMatch) {
//                     card.classList.remove('d-none');
//                     visibleCount++;
//                 } else {
//                     card.classList.add('d-none');
//                 }
//             });
//             if (noJobsMessage) noJobsMessage.classList.toggle('d-none', visibleCount > 0);
//         }

//         // Jobs page ke apply buttons
//         // document.querySelectorAll('.btn-apply-trigger').forEach(btn => {
//         //     btn.addEventListener('click', function() {
//         //         const cardItem = this.closest('.job-card-item');
//         //         const cardGrid = cardItem.querySelector('.job-grid-card');

//         //         document.getElementById('modalJobTitle').innerText = cardItem.getAttribute('data-title');
//         //         document.getElementById('modalCompanyName').innerText = cardGrid.getAttribute('data-company');
//         //         document.getElementById('modalLocation').innerText = cardGrid.getAttribute('data-location');
//         //         document.getElementById('modalSalary').innerText = "PKR " + cardItem.getAttribute('data-salary') + "k";
//         //         document.getElementById('modalDesc').innerText = cardGrid.getAttribute('data-desc');

//         //         applyModal.show();
//         //     });
//         // });
//         document.querySelectorAll('.btn-apply-trigger').forEach(btn => {
//     btn.addEventListener('click', function() {
//         const cardItem = this.closest('.job-card-item');
//         const cardGrid = cardItem.querySelector('.job-grid-card');

//         // Extract job details from data attributes
//         document.getElementById('modalJobTitle').innerText = cardItem.getAttribute('data-title');
//         document.getElementById('modalCompanyName').innerText = cardGrid.getAttribute('data-company');
//         document.getElementById('modalLocation').innerText = cardGrid.getAttribute('data-location');
//         document.getElementById('modalSalary').innerText = "PKR " + cardItem.getAttribute('data-salary') + "k";
//         document.getElementById('modalDesc').innerText = cardGrid.getAttribute('data-desc');  // Full description here

//         // Show modal
//         const applyModal = new bootstrap.Modal(document.getElementById('applyModal'));
//         applyModal.show();
//     });
// });


//         // Filter Events
//         checkboxes.forEach(box => box.addEventListener('change', filterJobs));
//         salaryRange?.addEventListener('input', () => { salaryValue.innerText = salaryRange.value; filterJobs(); });
//         searchInput?.addEventListener('keyup', filterJobs);
//         clearBtn?.addEventListener('click', () => {
//             checkboxes.forEach(box => box.checked = false);
//             if(salaryRange) salaryRange.value = 0;
//             if(salaryValue) salaryValue.innerText = "0";
//             if(searchInput) searchInput.value = "";
//             filterJobs();
//         });
//         filterJobs();
//     }

//     // --- JOB DETAILS PAGE LOGIC ---
//     // Agar page par h1 aur lead class hai (Detail page ki nishani)
//     const detailBtn = document.querySelector('.btn-custom[data-bs-target="#applyModal"]');
//     const pageJobHeader = document.querySelector('h1.display-6');

//     if (pageJobHeader && detailBtn) {
//         document.querySelectorAll('.btn-custom[data-bs-target="#applyModal"]').forEach(btn => {
//             btn.addEventListener('click', function(e) {
//                 // Default behavior ko thoda control karein
//                 const title = document.querySelector('h1').innerText;
//                 const leadText = document.querySelector('.lead').innerText;
//                 const company = leadText.split('•')[0].trim();
//                 const location = leadText.split('•')[1].trim();
//                 const salary = document.querySelectorAll('.overview-item span.fw-bold')[1].innerText;
//                 const description = document.querySelector('.job-body-section p.text-muted').innerText;

//                 document.getElementById('modalJobTitle').innerText = title;
//                 document.getElementById('modalCompanyName').innerText = company;
//                 document.getElementById('modalLocation').innerText = location;
//                 document.getElementById('modalSalary').innerText = salary;
//                 document.getElementById('modalDesc').innerText = description.substring(0, 200) + "...";

//                 applyModal.show();
//             });
//         });
//     }

//     // --- COMMON FORM LOGIC ---
//     if(fileInput) {
//         fileInput.addEventListener('change', function() {
//             if(this.files[0] && fileNameDisplay) {
//                 fileNameDisplay.innerText = "Ready: " + this.files[0].name;
//                 fileNameDisplay.classList.add('text-success');
//             }
//         });
//     }

//     // if(applicationForm) {
//     //     applicationForm.addEventListener('submit', function(e) {
//     //         e.preventDefault();
//     //         alert('Application submitted for ' + document.getElementById('modalJobTitle').innerText + '! 🚀');
//     //         applyModal.hide();
//     //     });
//     // }
//     // --- COMMON FORM LOGIC ---
// if(applicationForm) {
//     applicationForm.addEventListener('submit', function(e) {
//         e.preventDefault();

//         // 1. Job ka naam uthayein popup ke liye
//         const jobTitle = document.getElementById('modalJobTitle').innerText;
//         document.getElementById('successJobName').innerText = jobTitle;

//         // 2. Apply Modal ko band karein
//         applyModal.hide();

//         // 3. Form ko reset karein (taaki purani details hat jayein)
//         applicationForm.reset();
//         if(fileNameDisplay) fileNameDisplay.innerText = "Click to Select Resume";

//         // 4. Success Modal ko thodi der baad show karein (smooth transition ke liye)
//         setTimeout(() => {
//             const successPopup = new bootstrap.Modal(document.getElementById('successModal'));
//             successPopup.show();
//         }, 400);
//     });
// }
// });



// modal desc

// about js

const exploreAboutBtn = document.getElementById('exploreAbout');
    const aboutBanner = document.querySelector('.about-banner-initial');
    const aboutCarouselSection = document.getElementById('aboutCarouselSection');

    if (exploreAboutBtn && aboutCarouselSection) {
        exploreAboutBtn.addEventListener('click', function() {
            // Hide the initial banner with animation
            aboutBanner.classList.add('animate__animated', 'animate__fadeOutUp');

            // After banner animation completes, hide it completely and show carousel
            setTimeout(() => {
                aboutBanner.classList.add('d-none');
                aboutCarouselSection.classList.remove('d-none'); // Show the carousel section
                aboutCarouselSection.classList.add('animate__animated', 'animate__fadeInUp'); // Animate carousel in

                // Initialize Bootstrap carousel explicitly if needed, though data-bs-ride="carousel" usually handles it
                const carousel = new bootstrap.Carousel(document.getElementById('aboutCarousel'));

                // Scroll to the carousel section for better UX
                aboutCarouselSection.scrollIntoView({ behavior: 'smooth', block: 'start' });

            }, 800); // Match this timeout with the fadeOutUp animation duration (0.8s)
        });
    }


    // about explore our stoyry


    document.getElementById('exploreAbout').addEventListener('click', function() {
    const banner = document.querySelector('.about-banner-initial');
    const carouselSec = document.getElementById('aboutCarouselSection');

    // Smooth Fade out
    banner.classList.add('animate__animated', 'animate__fadeOut');

    setTimeout(() => {
        banner.classList.add('d-none');
        carouselSec.classList.remove('d-none');

        // Advance smooth scroll
        carouselSec.scrollIntoView({ behavior: 'smooth' });
    }, 600);
});


// dropdown
document.addEventListener("DOMContentLoaded", function() {
    if (window.innerWidth < 992) {
        const sectorLink = document.getElementById('sectorsDropdown');
        sectorLink.setAttribute('data-bs-toggle', 'dropdown');
    }
});
