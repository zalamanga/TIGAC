const header = document.querySelector("header");
document.body.onscroll = () => {
    if (window.scrollY > 0) {
        header.setAttribute(
            "class",
            "sticky-top bg-main shadow-sm border-bottom border-dark"
        );
    } else {
        header.setAttribute("class", "sticky-top bg-main");
    }
};
