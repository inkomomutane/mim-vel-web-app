<div>


    @foreach($imovels as $imovel)
        <div class="col-lg-12 col-12 mb-4 pb-2 " data-aos="fade-up" data-aos-duration="300">
            <x-post-card author="{{ $imovel->corretor->name }}"
                title="{{ $imovel->titulo }}"
                :description="$imovel->descricao"
                price="{{ $imovel->preco }}"

                ratings="{{ $imovel->ratings }}"

                quartos="{{ $imovel->quartos }}"
                area="{{ $imovel->area }}"
                suites="{{ $imovel->suites }}"
                banheiros="{{ $imovel->banheiros }}"
                piscinas="{{ $imovel->piscinas }}"
                garagens="{{ $imovel->garagens }}"

                url="{{ route('posts.show', $imovel->slug) }}"
                :date="$imovel->created_at"
                comments="{{ $imovel->comentarios->count() }}"
                ano="{{ $imovel->ano }}"
                >
                <x-slot:image>
                    @if ($imovel->getFirstMedia('posts'))
                                        {{ $imovel->getFirstMedia('posts')->img('', ['class' => 'slide-inner image-fluid cover-image-5']) }}
                                    @else
                                        <img src="{{ asset('website/images/placeholder.png') }}" class="slide-inner image-fluid cover-image-5" alt="No Image">
                                    @endif
                </x-slot:image>
            </x-post-card>
        </div>
    @endforeach
    <div class="col-12 mt-4 pt-2  row justify-content-between">
        <div class="col-sm-12">
            {{ $imovels->links() }}
        </div>
    </div>

</div>
