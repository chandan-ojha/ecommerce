// ===== Sidebar Collapsible JS
function updateLayoutForScreenSize() {
    const sidebar = document.querySelector(".sidebar");
    const heading = document.querySelector(".heading");
    const content = document.querySelector(".content");
    const menu_icon = document.querySelector(".menu_icon");
    const footer = document.querySelector(".footer_section");

    menu_icon.addEventListener("click", function () {
        sidebar.classList.toggle("sidebar_active");
        heading.classList.toggle("expanded");
        content.classList.toggle("expanded");
        footer.classList.toggle("expanded");
    });

    if (window.innerWidth <= 992) {
        sidebar.classList.add("sidebar_active");
        heading.classList.add("expanded");
        content.classList.add("expanded");
        footer.classList.add("expanded");
    } else {
        sidebar.classList.remove("sidebar_active");
        heading.classList.remove("expanded");
        content.classList.remove("expanded");
        footer.classList.remove("expanded");
    }
}

// Run on load
window.addEventListener("load", updateLayoutForScreenSize);

// Run on resize
window.addEventListener("resize", updateLayoutForScreenSize);
