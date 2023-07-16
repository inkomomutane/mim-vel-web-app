import { Modal } from "flowbite";
import type { ModalOptions, ModalInterface } from "flowbite";

window.addEventListener("load", function () {
    const $modalElement: HTMLElement | null = document.querySelector(
        "#authentication-modal"
    );

    const modalOptions: ModalOptions = {
        placement: "bottom-right",
        backdrop: "dynamic",
        backdropClasses:
            "bg-gray-900 bg-opacity-50 dark:bg-opacity-80 fixed inset-0 z-40",
        closable: true,
    };

    const modal: ModalInterface = new Modal($modalElement, modalOptions);

    modal.hide();
});
