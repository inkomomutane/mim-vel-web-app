<footer
aria-label="Mimóvel Footer"
class="bg-white dark:bg-gray-900 selection:bg-primary-500 selection:text-white"
>
<div
    class="mx-auto max-w-screen-xl pb-6 pt-16 sm:px-6 lg:px-16 lg:pt-24"
>
    <div class="grid grid-cols-1 gap-8 lg:grid-cols-5">
        <div class="lg:col-span-2">
            <div
                class="flex justify-center text-orange-600 dark:text-orange-300 sm:justify-start"
            >
                <img
                    src=""
                    class="mr-3 h-8 text-orange-400 font-semibold"
                    alt="{{ $globals->name ?? '' }}"
                />
            </div>

            <p
                class="mt-6 leading-relaxed text-center sm:text-justify text-gray-500 dark:text-gray-400 max-w-5xl"
            >
                {{ $globals->content ?? '' }}
            </p>

            <ul
                class="mt-8 flex justify-center gap-6 sm:justify-start md:gap-8"
            >
                <li>
                    <a
                        href="{{ $globals->facebook ?? '' }}"
                        rel="noreferrer"
                        target="_blank"
                        class="text-orange-500 transition hover:text-orange-500/75 dark:text-orange-500 dark:hover:text-orange-500/75"
                    >
                        <span class="sr-only">Facebook</span>
                        <svg
                            class="h-6 w-6"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                </li>

                <li>
                    <a
                        :href="{{ $globals->instagram ?? ''}}"
                        rel="noreferrer"
                        target="_blank"
                        class="text-orange-500 transition hover:text-orange-500/75 dark:text-orange-500 dark:hover:text-orange-500/75"
                    >
                        <span class="sr-only">Instagram</span>
                        <svg
                            class="h-6 w-6"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                </li>

                <li>
                    <a
                        href="/"
                        rel="noreferrer"
                        target="_blank"
                        class="text-orange-500 transition hover:text-orange-500/75 dark:text-orange-500 dark:hover:text-orange-500/75"
                    >
                        <span class="sr-only">Mimóvel</span>
                        <svg
                            class="h-6 w-6"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                </li>
            </ul>
        </div>

        <div
            class="grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3 lg:col-span-3"
        >
            <div class="text-center sm:text-left">
                <p
                    class="text-lg font-medium text-gray-900 dark:text-white"
                >
                    Links de navegação
                </p>

                <nav aria-label="Footer Navigation Nav" class="mt-8">
                    <ul class="space-y-4 text-sm">
                        <li>
                            <a
                                href="{{ route('welcome') }}"
                                class="hover:underline text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                                >Início</a
                            >
                        </li>
                        <li>
                            <a
                                href=""
                                class="hover:underline text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                                >Todos imóveis</a
                            >
                        </li>
                        <li>
                            <a
                                href="{{ route('website.about')}}"
                                class="hover:underline text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                                >Sobre nós</a
                            >
                        </li>
                        <li>
                            <a
                                href="{{ route('website.contact')}}"
                                class="hover:underline text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                                >Contacte nos</a
                            >
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="text-center sm:text-left">
                <p
                    class="text-lg font-medium text-gray-900 dark:text-white"
                >
                    Legal
                </p>

                <nav aria-label="Footer Services Nav" class="mt-8">
                    <ul class="space-y-4 text-sm">
                        <li>
                            <a
                                href="{{ route('website.policy') }}"
                                class="hover:underline text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                                >Políticas de privacidade</a
                            >
                        </li>
                        <li>
                            <a
                                href="{{ route('website.terms') }} "
                                class="hover:underline text-gray-700 transition hover:text-gray-700/75 dark:text-white dark:hover:text-white/75"
                                >Termos &amp; condições</a
                            >
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="text-center sm:text-left">
                <p
                    class="text-lg font-medium text-gray-900 dark:text-white"
                >
                    Contactos
                </p>

                <ul class="mt-8 space-y-4 text-sm">
                    <li>
                        <a
                            class="flex items-center justify-center gap-1.5 ltr:sm:justify-start rtl:sm:justify-end"
                            href="mailto:{{ $globals->email ?? '' }}"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 shrink-0 text-gray-900 dark:text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"
                                />
                            </svg>

                            <span
                                class="flex-1 text-gray-700 dark:text-gray-300"
                            >
                                {{ $globals->email ?? '' }}
                            </span>
                        </a>
                    </li>

                    <li>
                        <a
                            class="flex items-center justify-center gap-1.5 ltr:sm:justify-start rtl:sm:justify-end"
                            href="tel:+258869500900"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 shrink-0 text-gray-900 dark:text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                />
                            </svg>

                            <span
                                class="flex-1 text-gray-700 dark:text-gray-300 break-words"
                                >(+258) 86 95 00 900</span
                            >
                        </a>
                    </li>
                    <li>
                        <a
                            class="flex items-center justify-center gap-1.5 ltr:sm:justify-start rtl:sm:justify-end"
                            href="tel:+258849500900"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 shrink-0 text-gray-900 dark:text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"
                                />
                            </svg>

                            <span
                                class="flex-1 text-gray-700 dark:text-gray-300 break-words"
                                >(+258) 84 95 00 900</span
                            >
                        </a>
                    </li>
                    <li
                        class="flex items-start justify-center gap-1.5 ltr:sm:justify-start rtl:sm:justify-end"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 shrink-0 text-gray-900 dark:text-white"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                        </svg>

                        <address
                            class="-mt-0.5 flex-1 not-italic text-gray-700 dark:text-gray-300"
                        >
                            {{ $globals->location ?? '' }}
                        </address>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div
        class="mt-12 border-t border-gray-100 pt-6 dark:border-gray-800"
    >
        <div
            class="text-center sm:flex sm:justify-between sm:text-left"
        >
            <p class="text-sm text-gray-500 dark:text-gray-400">
                <span class="block sm:inline"
                    >Todos direitos reservados.</span
                >

                <a
                    class="inline-block text-orange-600 underline transition hover:text-orange-600/75 dark:text-orange-500 dark:hover:text-orange-500/75"
                    href="{{ route('website.terms') }} "
                >
                    Termos & condições
                </a>

                <span>&middot;</span>

                <a
                    class="inline-block text-orange-600 underline transition hover:text-orange-600/75 dark:text-orange-500 dark:hover:text-orange-500/75"
                    href="{{ route('website.policy') }}"
                >
                    Políticas de privacidade
                </a>
            </p>

            <p
                class="mt-4 text-sm text-gray-500 dark:text-gray-400 sm:order-first sm:mt-0 mr-4"
            >
                Copyright &copy; {{ $globals->name ?? '' }}
                {{ now()->year }}.
                <span> {{ $globals->slogan ?? ''}}</span>
            </p>
        </div>
    </div>
</div>
</footer>
