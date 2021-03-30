<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$soc->id_socio}}">
	{{form::open(array('action'=>array('AdministracionSocioController@destroy', $soc->id_socio), 'method'=>'delete'))}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="Close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">x</span>
				</button>
				<h4 class="modal-title">Eliminar Socio</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea Eliminar el Socio</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>		
		</div>
	</div>
	{{form::Close()}}
	
</div>