<div>
    <div class="container">
        <h2>{{ $this->bien->lib ?? '' }}</h2>
    </div>
    <div class="container card p-3">
        <form wire:submit.prevent="save">
            @csrf
            <div class="row">
                <div class="col-lg-5">
                    <label for="photo">Photo</label>
                    <input type="file" class="form-control @error('photo') is-invalid @enderror" id="photo" wire:model="photo" @if($disabledForm) disabled @endif>
                    @error('photo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @if($action == "ajouter" && $photo)
                        <img src="{{ $photo->temporaryUrl() }}" class="img-fluid rounded">
                    @elseif($action != 'ajouter')
                        <br>
                        @if($photo && !is_string($photo) && $photo->temporaryUrl() !== null)
                            <img src="{{ $photo->temporaryUrl() }}" class="img-fluid rounded">
                        @else
                            <img src="{{ $photoComplete }}" class="img-fluid rounded">
                        @endif
                    @endif
                </div>
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-7 mb-3 mb-lg-0">
                            <input type="text" class="form-control @error('lib') is-invalid @enderror" id="inputLib" wire:model="lib" placeholder="Libellé du bien" @if($disabledForm) disabled @endif>
                            @error('lib')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-5">
                            <select wire:model="type_annonce_id" class="form-select @error('type_annonce_id') is-invalid @enderror" @if($disabledForm) disabled @endif>
                                <option value="">-- Type d'annonce --</option>
                                @foreach($typeAnnonce as $annonce)
                                    <option value="{{ $annonce->id }}">{{ $annonce->type_annonce }}</option>
                                @endforeach
                            </select>
                            @error('type_annonce_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <select wire:model="type_bien_id" class="form-select @error('type_bien_id') is-invalid @enderror" @if($disabledForm) disabled @endif>
                                <option value="">-- Type de bien --</option>
                                @foreach($typeBien as $leBien)
                                    <option value="{{ $leBien->id }}">{{ $leBien->type_bien }}</option>
                                @endforeach
                            </select>
                            @error('type_bien_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <div class="row">
                                <div class="col-auto">
                                    <label for="inputPrix" class="visually-hidden">Prix €</label>
                                    <input type="text" style="width:150px" class="form-control @error('prix') is-invalid @enderror" id="inputPrix" wire:model="prix" placeholder="Prix en €" @if($disabledForm) disabled @endif>
                                    @error('prix')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" wire:model="sold" @if($disabledForm) disabled @endif>
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Vendu / Loué</label>
                                        @error('sold')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>                                
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-0 mt-lg-3">
                        <div class="col-12">
                            <textarea wire:model="description" class="form-control" placeholder="Description du bien" style="height: 100px" @if($disabledForm) disabled @endif></textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-6 mb-3 mb-lg-0">
                            <select wire:model="classe_energie" class="form-select @error('classe_energie') is-invalid @enderror" @if($disabledForm) disabled @endif>
                                <option value="">-- Classe énergétique --</option>
                                @foreach($classeEnergieList as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                @endforeach
                            </select>
                            @error('classe_energie')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="offset-lg-2 col-lg-4">
                            <input wire:model="sh" type="text" class="form-control @error('sh') is-invalid @enderror" placeholder="Superficie habitables en m²" aria-label="Superficie habitables en m²" @if($disabledForm) disabled @endif>
                            @error('sh')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-8">
                            <div class="row">
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <input wire:model="chambre" type="text" class="form-control @error('chambre') is-invalid @enderror" placeholder="Nombre de chambre" aria-label="Nombre de chambre" @if($disabledForm) disabled @endif>
                                    @error('chambre')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <input wire:model="sdb" type="text" class="form-control @error('sdb') is-invalid @enderror" placeholder="Salle de bains" aria-label="Salle de bains" @if($disabledForm) disabled @endif>
                                    @error('sdb')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-lg-4 mb-3 mb-lg-0">
                                    <input wire:model="wc" type="text" class="form-control @error('wc') is-invalid @enderror" placeholder="WC" aria-label="WC" @if($disabledForm) disabled @endif>
                                    @error('wc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <input wire:model="st" type="text" class="form-control @error('st') is-invalid @enderror" placeholder="Superficie terrain en m²" aria-label="Superficie terrain en m²" @if($disabledForm) disabled @endif>
                            @error('st')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="offset-lg-8 col-lg-4 d-grid gap-2 d-md-flex justify-content-md-end">
                            @if($disabledForm) 
                                <a href="{{route('biens.index')}}" class="btn btn-primary">Retour aux biens</a>
                            @else
                                <button type="submit" class="btn btn-primary">Valider</button>
                                <a href="{{ route('biens.index') }}" class="btn btn-secondary">Annuler</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @if(Session::has('status'))
        <div class="alert alert-success alert-bottom mt-4" role="alert">{{Session::get('status')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger alert-bottom mt-4" role="alert">{{Session::get('error')}} <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>
    @endif
</div>
