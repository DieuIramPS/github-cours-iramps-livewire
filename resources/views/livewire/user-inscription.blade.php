<div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Inscription</div>
                    <div class="card-body">
                        <form wire:submit.prevent="inscription">
                            @csrf
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label">Adresse email</label>
                                <div class="col-md-8">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" wire:model.defer="email" autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="email_confirmation" class="col-md-4 col-form-label">Email vérification</label>
                                <div class="col-md-8">
                                    <input id="email_confirmation" type="email" class="form-control @error('email_confirmation') is-invalid @enderror" wire:model.defer="email_confirmation" autocomplete="email_confirmation">
                                    @error('email_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label">Password</label>
                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" wire:model.defer="password" autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label">Password vérification</label>
                                <div class="col-md-8">
                                    <input id="password-confirm" type="password" class="form-control" wire:model.defer="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label">Nom Prénom</label>
                                <div class="col-md-8">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="name" autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="adresse" class="col-md-4 col-form-label">Adresse</label>
                                <div class="col-md-8">
                                    <input id="adresse" type="text" class="form-control @error('adresse') is-invalid @enderror" wire:model.defer="adresse" autocomplete="adresse" autofocus>
                                    @error('adresse')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-3">
                                <label for="pays_id" class="col-md-4 col-form-label">Pays</label>
                                <div class="col-md-8">
                                    <select id="pays_id" class="form-control @error('selectedPays') is-invalid @enderror" wire:model.live="selectedPays">
                                        <option value="">Sélectionnez</option>
                                        @foreach($pays as $unPays)
                                            <option value="{{ $unPays->id }}">{{ $unPays->nom_pays }}</option>
                                        @endforeach
                                    </select>
                                    @error('selectedPays')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
  
                            <div class="row mb-3">
                                <label for="ville_id" class="col-md-4 col-form-label">Localité</label>
                                <div class="col-md-8 position-relative">
                                    <div wire:loading wire:target="selectedPays" class="loader"></div>
                                    <select id="ville_id" class="form-control @error('ville_id') is-invalid @enderror" wire:model.defer="ville_id" @if($selectedPays == null) disabled @endif>
                                        <option value="">Sélectionnez</option>
                                        @if($selectedPays)
                                            @foreach($villes as $uneVille)
                                                <option value="{{ $uneVille->id }}">{{ $uneVille->ville }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('ville_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
    
                            <div class="row mb-3">
                                <label class="col-md-4 col-form-label"></label>
                                <div class="col-md-8">
                                    <div class="form-check @error('conditionsgenerale') is-invalid @enderror">
                                        <input type="checkbox" class="form-check-input" id="conditionsgenerale" wire:model.defer="conditionsgenerale">
                                        <label class="form-check-label" for="conditionsgenerale">J'accepte les conditions générales d'utilisation.</label>
                                    </div>
                                    @error('conditionsgenerale')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-secondary w-100" wire:click="cancel">
                                        Annuler
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary w-100" wire:click="inscription">Inscription</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>