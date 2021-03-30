<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$ing->id_detalle_ingreso}}">
	{{form::open(array('action'=>array('IngresoVariosController@destroy', $ing->id_detalle_ingreso), 'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="Close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Ingreso</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el Ingreso</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>		
		</div>
	</div>
	{{form::Close()}}
	
</div>