<div class="container">
     <h1>Edit Municipality</h1>
 
     <form method="POST" action="{{ route('municipios.update', ['municipio' => $municipio->muni_codi]) }}">
         @method('put')
         @csrf
 
         <div class="mb-3">
             <label for="codigo" class="form-label">Id</label>
             <input type="text" class="form-control" id="id" aria-describedby="codigoHelp" name="id" disabled="disabled" value="{{ $municipio->muni_codi }}">
             <div id="codigoHelp" class="form-text">municipio Id.</div>
         </div>
 
         <div class="mb-3">
             <label for="name" class="form-label">municipio</label>
             <input type="text" required class="form-control" id="name" placeholder="municipality name" name="name" value="{{ $municipio->muni_nomb }}">
         </div>
 
         <label for="department">department:</label>
         <select class="form-select" id="department" name="code" required>
             <option selected disabled value="">Choose one...</option>
             @foreach($departamentos as $departamento)
                 @if($departamento->depa_codi == $departamento->depa_codi)
                     <option selected value="{{ $departamento->depa_codi }}">{{ $departamento->depa_nomb }}</option>
                 @else
                     <option value="{{ $departamento->depa_codi }}">{{ $departamento->depa_nomb }}</option>
                 @endif
             @endforeach
         </select>
 
         <div class="mt-3">
             <button type="submit" class="btn btn-primary">Update</button>
             <a href="{{ route('municipios.index') }}" class="btn btn-warning">Cancel</a>
         </div>
     </form>
 </div>