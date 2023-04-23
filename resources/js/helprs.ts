import { FlahserType } from "./types/index.d";
import flasher from "@flasher/flasher";
const Flasher = flasher;
Flasher.addTheme("flasher", {
    render: function (envelope) {
        var notification = envelope.notification;
        switch (notification.type) {
            case FlahserType.success:
                return success(notification.message);
            case FlahserType.error:
                return error(notification.message);
            case FlahserType.warning:
                return warning(notification.message);
            case FlahserType.info:
                return info(notification.message);
            default:
                return info(notification.message);
        }
    },
});
export default Flasher;

const success = (
    message: string
) => `<div  class="shadow-2xl flex p-4 mb-4 text-white border-b-4 border-green-600 dark:border-slate-200
bg-green-400 dark:text-blue-100 dark:bg-gray-600" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="white"/>
<path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="white"/>
</svg>
   <div class="ml-3 text-sm font-medium"> ${message} </div>
</div>`;

const error = (
    message: string
) => `<div  class="shadow-2xl flex p-4 mb-4 text-white border-b-4 border-red-800 dark:border-slate-200
bg-red-500 dark:text-blue-100 dark:bg-gray-600" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="white"/>
<path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="white"/>
</svg>
   <div class="ml-3 text-sm font-medium"> ${message} </div>
</div>`;

const warning = (
    message: string
) => `<div  class="shadow-2xl flex p-4 mb-4 text-white border-b-4 border-orange-600 dark:border-slate-200
bg-orange-400 dark:text-blue-100 dark:bg-gray-600" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path opacity="0.5" d="M12.8956 13.4982L10.7949 11.2651C10.2697 10.7068 9.38251 10.7068 8.85731 11.2651C8.37559 11.7772 8.37559 12.5757 8.85731 13.0878L12.7499 17.2257C13.1448 17.6455 13.8118 17.6455 14.2066 17.2257L21.1427 9.85252C21.6244 9.34044 21.6244 8.54191 21.1427 8.02984C20.6175 7.47154 19.7303 7.47154 19.2051 8.02984L14.061 13.4982C13.7451 13.834 13.2115 13.834 12.8956 13.4982Z" fill="white"/>
<path d="M7.89557 13.4982L5.79487 11.2651C5.26967 10.7068 4.38251 10.7068 3.85731 11.2651C3.37559 11.7772 3.37559 12.5757 3.85731 13.0878L7.74989 17.2257C8.14476 17.6455 8.81176 17.6455 9.20663 17.2257L16.1427 9.85252C16.6244 9.34044 16.6244 8.54191 16.1427 8.02984C15.6175 7.47154 14.7303 7.47154 14.2051 8.02984L9.06096 13.4982C8.74506 13.834 8.21146 13.834 7.89557 13.4982Z" fill="white"/>
</svg>
   <div class="ml-3 text-sm font-medium"> ${message} </div>
</div>`;

const info = (
    message: string
) => `<div  class="shadow-2xl flex p-4 mb-4 text-white border-b-4 border-blue-600 dark:border-slate-200
bg-blue-400 dark:text-blue-100 dark:bg-gray-600" role="alert">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
<path
    d="M8 0C3.6 0 0 3.6 0 8s3.6 8 8 8 8-3.6 8-8-3.6-8-8-8zm0 12c-.6 0-1-.4-1-1s.4-1 1-1 1 .4 1 1-.4 1-1 1zm1-3H7V4h2v5z"
/>
</svg>
   <div class="ml-3 text-sm font-medium"> ${message} </div>
</div>`;

export const tooltip = (message: string) => {
    return {
        value: `<h4 class='text-white p-2 dark:text-slate-900 text-sm'>${message}</h4>`,
        escape: true,

        class: "bg-slate-950 dark:bg-slate-100 ml-5 rounded ",
    };
};
