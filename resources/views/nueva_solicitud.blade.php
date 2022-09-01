@extends('layouts.main', ['activePage'=>'dashboard', 'titlePage' => __('Nueva solicitud')])

@section('content')

<div class="content">
    <div class="container-fluid">
        <form>

            <div class="form-group"> <!-- Full Name -->
                <label for="full_name_id" class="control-label">Asunto</label>
                <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="Asunto del reporte">
            </div>    
            <br>
            <br>
                                            
                                    
            <div class="form-group"> <!-- State Button -->
                <label for="state_id" class="control-label">Proyecto</label>
                <select class="form-control" id="state_id">
                    <option value="AL">Querétaro</option>
                    <option value="AK">Quintana Roo</option>
                    <option value="AZ">Dep 1</option>
                    <option value="AR">Proyecto 3</option>
                    
                </select>                    
            </div>
            <br>
            <br>
            <div class="form-group"> <!-- Zip Code-->
                <label for="zip_id" class="control-label">Descripción</label>
                <textarea class="form-control" id="message" name="message" placeholder="Describe el reporte a realizar" rows="7"></textarea>
            </div>        
            
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>     
            
        </form>
        <br>
        
                     
</div>

@endsection