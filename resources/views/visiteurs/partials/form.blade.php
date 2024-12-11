<div class="mb-3">
    <label for="Nom" class="form-label">Nom</label>
    <input type="text" id="Nom" name="Nom" class="form-control" value="{{ old('Nom', $visiteur->Nom ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Prenom" class="form-label">Prénom</label>
    <input type="text" id="Prenom" name="Prenom" class="form-control" value="{{ old('Prenom', $visiteur->Prenom ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Naiss" class="form-label">Date de Naissance</label>
    <input type="date" id="Naiss" name="Naiss" class="form-control" value="{{ old('Naiss', $visiteur->Naiss ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Lieu" class="form-label">Lieu de Naissance</label>
    <input type="text" id="Lieu" name="Lieu" class="form-control" value="{{ old('Lieu', $visiteur->Lieu ?? '') }}" required>
</div>

<div class="mb-3">
    <label for="Sexe" class="form-label">Sexe</label>
    <select id="Sexe" name="Sexe" class="form-control" required>
        <option value="Masculin" {{ old('Sexe', $visiteur->Sexe ?? '') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
        <option value="Féminin" {{ old('Sexe', $visiteur->Sexe ?? '') == 'Féminin' ? 'selected' : '' }}>Féminin</option>
    </select>
</div>

<div class="mb-3">
    <label for="id_loc" class="form-label">Localité</label>
    <select id="id_loc" name="id_loc" class="form-control" required>
        <option value="">-- Sélectionnez une localité --</option>
        @foreach($localites as $localite)
        <option value="{{ $localite->id_loc }}" {{ old('id_loc', $visiteur->id_loc ?? '') == $localite->id_loc ? 'selected' : '' }}>
            {{ $localite->Nomloc }}
        </option>
        @endforeach
    </select>
</div>
