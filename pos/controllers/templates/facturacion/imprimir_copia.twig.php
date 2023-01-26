<html lang="en">

<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
			
    	<div class="modal-header">


		    <label for="">Factura #</label>
		    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
		</div>

		<div class="modal-body">
        
		    <div class="table-responsive">

			<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

	      <thead>

	        <tr>

	          <th>Id producto</th>
	          <th>Producto</th>
	          <th>Cantidad</th>
	          <th>Valor</th>

	        </tr>

	      </thead>

	      <tbody>
	        

	      </tbody>

	    </table>

	    </div>

        </button>

    	 </div>

	<form id="form" name="form" action="imprimirCopia.php" method="post">

      <div class="modal-footer">

		    <input type="submit" name="actualizar" value="Imprimir" class="btn btn-primary" id="actualizar">

    		<a href="" class="btn btn-warning" data-dismiss="modal" >Cancelar</a>

      </div>
</form>

    </div>

  </div>

</div>

</html>		