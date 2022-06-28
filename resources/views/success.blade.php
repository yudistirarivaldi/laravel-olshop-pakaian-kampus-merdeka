<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />
        <div>
            {{-- <div class="text-center text-gray-500">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                <span class="sr-only">Loading...</span>
            </i>
            </div> --}}
            <div class="text-white text-center mt-5 font-mono font-semibold">
                <div class=" text-2xl">Selamat Registrasi Akun Berhasil!!</div>

                <div class="mt-10">
                    <a href="{{ __('/') }}" class="rounded-lg hover:text-black">
                        <i class="fa fa-arrow-left w-2 h-3" aria-hidden="true"></i>&nbsp;Langsung Belanja
                    </a>
                </div>
            </div>
        </div>


        </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
