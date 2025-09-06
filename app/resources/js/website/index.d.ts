export {};

declare global {
    interface Window {
        changeMenuStatus: () => void; // 👈️ turn off type checking
    }
}
