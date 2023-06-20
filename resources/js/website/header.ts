let showMenu = true;

const changeMenuStatus = () => {
    showMenu = !showMenu;
    const menuNavigation = document.querySelector("#mobile-menu-2");

    if (showMenu) {
        menuNavigation?.classList.remove(
            "hidden",
            "justify-between",
            "items-center",
            "w-full",
            "lg:flex",
            "lg:w-auto",
            "lg:order-1"
        );
        menuNavigation?.classList.add(
            "justify-between",
            "items-center",
            "w-full",
            "lg:flex",
            "lg:w-auto",
            "lg:order-1"
        );
    } else {
        menuNavigation?.classList.remove(
            "justify-between",
            "items-center",
            "w-full",
            "lg:flex",
            "lg:w-auto",
            "lg:order-1"
        );
        menuNavigation?.classList.add(
            "hidden",
            "justify-between",
            "items-center",
            "w-full",
            "lg:flex",
            "lg:w-auto",
            "lg:order-1"
        );
    }
};

window.addEventListener("scroll", () => {
    const navigator = document.querySelector("#navigation");
    const solidBg: boolean = navigator?.getAttribute("data-bg") === "true";
    console.log(navigator?.getAttribute("data-bg"));

    let y = 1 + (window.scrollY || window.pageYOffset) / 150;
    y = y < 1 ? 1 : y;
    if (y > 1) {
        if (solidBg != true) {
            navigator?.classList.remove(
                "lg:bg-transparent",
                "lg:text-white",
                "ease-in-out"
            );
            navigator?.classList.add(
                "lg:bg-white",
                "lg:text-gray-700",
                "ease-in-out"
            );
        } else {
            navigator?.classList.add(
                "lg:bg-white",
                "lg:text-gray-700",
                "ease-in-out"
            );
        }
    } else {


        if (solidBg == true) {
            navigator?.classList.remove(
                "lg:bg-transparent",
                "lg:text-white",
                "ease-in-out"
            );
            navigator?.classList.add(
                "lg:bg-white",
                "lg:text-gray-700",
                "ease-in-out"
            );
        } else {
            navigator?.classList.remove(
                "lg:bg-white",
                "lg:text-gray-700",
                "ease-in-out"
            );
            navigator?.classList.add(
                "lg:bg-transparent",
                "lg:text-white",
                "ease-in-out"
            );
        }
    }
});

window.addEventListener("DOMContentLoaded", () => {
    changeMenuStatus();
});

window.changeMenuStatus = changeMenuStatus;
