
<div class="container">
     <h1>Edit paises</h1>
 
     <form method="POST" action="{{ route('paises.update', ['pais' => $pais->pais_codi]) }}">
         @method('put')
         @csrf
 
         <div class="mb-3">
             <label for="codigo" class="form-label">Id</label>
             <input type="text" class="form-control" id="codi" aria-describedby="codigoHelp" name="codi" disabled="disabled" value="{{ $pais->pais_codi }}">
             <div id="codigoHelp" class="form-text">pais codi.</div>
         </div>
 
         <div class="mb-3">
             <label for="name" class="form-label">pais nombre</label>
             <input type="text" required class="form-control" id="name" placeholder="pais name" name="name" value="{{ $pais->pais_nomb }}">
         </div>

         <div class="mb-3">
            <label for="capi" class="form-label">capi</label>
            <input type="text" required class="form-control" id="name" placeholder="pais name" name="capi" value="{{ $pais->pais_capi }}">
        </div>
 
         <div class="mt-3">
             <button type="submit" class="btn btn-primary">Update</button>
             <a href="{{ route('paises.index') }}" class="btn btn-warning">Cancel</a>
         </div>
     </form>
 </div>