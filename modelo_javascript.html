<?php
    use Cake\Routing\Router;
?>
<style>
@media screen
{
    .noverScreen
    {
      display:none
    }
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
			<input type="hidden" id="type-invoice" value="<?= $menuOption ?>">
            <div class="row">
                <div class="col-md-12">
					<?php if ($menuOption == 'Factura inscripción regulares'): ?>
						<h3><b>Factura inscripción alumnos regulares</b></h3>
					<?php elseif ($menuOption == 'Factura inscripción nuevos'): ?>
						<h3><b>Factura inscripción alumnos nuevos</b></h3>
					<?php elseif ($menuOption == 'Recibo inscripción regulares'): ?>
						<h3><b>Recibo inscripción alumnos regulares</b></h3>
					<?php elseif ($menuOption == 'Recibo inscripción nuevos'): ?>
						<h3><b>Recibo inscripción alumnos nuevos</b></h3>
					<?php elseif ($menuOption == 'Recibo servicio educativo'): ?>
						<h3><b>Recibo servicio educativo</b></h3>
					<?php else: ?>
						<h3><b>Cobranza</b></h3>
					<?php endif; ?>
                    <h5 id="Turno" value=<?= $idTurn ?>>Fecha: <?= $dateTurn->format('d-m-Y') ?>, Turno: <?= $turn ?>, Cajero: <?= $current_user['first_name'] . ' ' . $current_user['surname'] ?></h5>
                </div>
            </div>
			<div class="row panel panel-default">
				<div class="col-md-3">
					<?= $this->Form->input('dollar_exchange_rate', ['label' => 'Tasa oficial $:', 'class' => 'alternative-decimal-separator', 'value' => number_format(($dollarExchangeRate), 2, ",", ".")]) ?>
					<button id="update-dollar" class="btn btn-success">Actualizar</button>
					<p id="dollar-messages"></p>
				</div>
				<div class="col-md-3">
					<?= $this->Form->input('euro', ['label' => 'Tasa oficial COP:', 'class' => 'alternative-decimal-separator', 'value' => number_format(($euro), 2, ",", ".")]) ?>
					<button id="update-euro" class="btn btn-success">Actualizar</button>
					<p id="euro-messages"></p>
				</div>
				<div class="col-md-3">
					<?= $this->Form->input('tasa_temporal_dolar', ['label' => 'Tasa temporal $:', 'class' => 'alternative-decimal-separator', 'value' => number_format((0), 2, ",", ".")]) ?>
					<button id="establecer-tasa-dolar" class="btn btn-success">Establecer</button>
					<button id="eliminar-tasa-dolar" class="btn btn-success noverScreen">Eliminar</button>
				</div>
				<div class="col-md-3">
					<?= $this->Form->input('tasa_temporal_euro', ['label' => 'Tasa temporal COP:', 'class' => 'alternative-decimal-separator', 'value' => number_format((0), 2, ",", ".")]) ?>
					<button id="establecer-tasa-euro" class="btn btn-success">Establecer</button>
					<button id="eliminar-tasa-euro" class="btn btn-success noverScreen">Eliminar</button>
				</div>
			</div
            <div class="row panel panel-default">
                <div class="col-md-4">
					<br />
                    <label for="family">Cédula del representante:</label>
                    <input type="text" class="form-control" id="family-search">
                    <br />
					<label for="family">Apellido del representante:</label>
                    <input type="text" class="form-control" id="busqueda-apellido-representante">
                    <br />
					<label for="family">Apellido del alumno:</label>
                    <br />
                    <input type="text" class="form-control" id="busqueda-apellido-alumno">
                    <br />
                    <div class="panel panel-default pre-scrollable" style="height:100px;">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <tbody id="response-container"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <br />
                    <?= $this->Form->input('date_and_time', ['label' => 'Fecha:']) ?>
                    <?= $this->Form->input('client', ['label' => 'Cliente:', 'class' => 'campo-resaltado']) ?>
					<div id="mensaje-cliente" class="mensajes-usuario"></div>
                    <?= $this->Form->input('type_of_identification_client', 
                        ['options' => 
                        [null => "",
                        'V' => 'Cédula venezolano',
                        'E' => 'Cédula extranjero',
                        'P' => 'Pasaporte',
                        'J' => 'Rif Jurídico',
                        'G' => 'Rif Gubernamental'],
                        'label' => 'Tipo de documento de identificación:',
						'class' => 'campo-resaltado']) ?>
					<div id="mensaje-tipo-de-identificacion" class="mensajes-usuario"></div>
                    <?= $this->Form->input('identification_number_client', ['label' => 'Número de cédula o RIF:', 'class' => 'entero campo-resaltado']) ?>
					<div id="mensaje-numero-identificacion-cliente" class="mensajes-usuario"></div>
                </div>
                <div class="col-md-4">
                    <br />
                    <?= $this->Form->input('fiscal_address', ['label' => 'Dirección:', 'class' => 'campo-resaltado']) ?>
					<div id="mensaje-direccion-fiscal" class="mensajes-usuario"></div>
                    <?= $this->Form->input('tax_phone', ['label' => 'Teléfono:', 'class' => 'entero campo-resaltado']) ?>
					<div id="mensaje-telefono" class="mensajes-usuario"></div>
                    <?= $this->Form->input('email', ['label' => 'Correo electrónico:']) ?>
                    <br />
                    <button id="update-data" class="btn btn-success">Actualizar datos del cliente</button>
                    <br />
                    <br />
                    <p id="header-messages"></p>
                    <br />
                </div>
            </div>
            <br />
            <div class="row panel panel-default">
                <div class="col-md-3">
                    <br />
                    <p><b>Alumnos relacionados:</b></p>
                    <div class="panel panel-default pre-scrollable" style="height:260px;">
                        <div class="panel-body">
                            <div class="table-responsive">          
                                <table class="table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th scope="col">Apellido</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">&nbsp;&nbsp;&nbsp;Grado&nbsp;&nbsp;&nbsp;</th>
                                            <th scope="col">Sección</th>
                                            <th scope="col">Condición</th>
                                        </tr>
                                    </thead>
                                    <tbody id="related-students"></tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <br />
                    <p><b>Cuotas pendientes:</b></p>
                    <div class="panel panel-default pre-scrollable" style="height:210px;">
                        <div class="panel-body">
                            <div class="table-responsive">          
                                <table class="table table-striped table-hover estado-cuenta" >
                                    <thead>
                                        <tr>
											<th scope="col" style="width:5%"></th>
                                            <th scope="col" style="font-size: 11px; width:15%">Concepto</th>
											<th scope="col" style="font-size: 11px; width:15%">Cuota($)</th>
                                            <th scope="col" style="font-size: 11px; width:15%">Abonado($)</th>
											<th scope="col" style="font-size: 11px; width:10%">Pendiente($)</th>
											<th scope="col" style="font-size: 11px; width:10%">A pagar($)</th>
											<th scope="col" style="color: blue; font-size: 10px; width:10%">A pagar(P)</th>
											<th scope="col" style="color: red; font-size: 10px; width:10%">A pagar(Bs.)</th>
											<th scope="col" style="font-size: 11px; width:10%">Observación</th>
											<th scope="col" class="noverScreen"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="monthly-payment"></tbody>
                                </table>
                            </div>
                        </div>
                    </div> 
					<div class="row">
						<div class="col-md-6">
							<div id="nota-credito">
							</div>
							<div id="botones-cuotas">
								<p>
									<button id="mark-quotas" class="btn btn-success" disabled>Cobrar</button>
									<button id="uncheck-quotas" class="btn btn-success" disabled>Reversar</button>  
									<button id="adjust-fee" class="btn btn-success" disabled>Ajustar</button>
									<button id="imprimir-estado-cuenta" class="btn btn-success">Imprimir estado de cuenta</button>
								</p>
							</div>
							<div id="botones-notas" class="noverScreen">
								<p>
									<button id="compensar" class="btn btn-success">Compensar</button>
								</p>
							</div>
						</div>
						<div class="col-md-3">
							<p>Cuotas: <b><spam id="student-concept"></spam></b></p>
						</div>
						<div class="col-md-3">
							<p>Sub-total alumno $: <b><spam id="student-balance">0</spam></b></p>
							<p>Sub-total familia $: <b><spam id="total-balance"></spam></b></p> 
						</div>  						
					</div>
                </div>
            </div>
			<div class="row"
				<p id="student-messages"></p>
			</div>
			<div class="row">
			    <div class="col-md-5">
                    <div class="row">
                        <div class="col-md-12 panel panel-default">
                            <br />
                            <p><b>Registrar pago:</b></p>
                            <div id="accordion">
								<h3>Efectivo</h3>
								<div>
									<div class="row">
										 <label class="check-dolar" for="check1">
											<spam><input type="checkbox" class="check-dolar" checked='checked'> Dólar&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-euro" for="check1">
											<spam style="color: blue;"><input type="checkbox" class="check-euro"> COP&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-bolivar" for="check1">
											<spam style="color: red;"><input type="checkbox" class="check-bolivar"> Bolívar&nbsp;&nbsp;&nbsp;</spam>
										</label>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?= $this->Form->input('amount', ['label' => 'Monto:', 'id' => 'amount-01', 'class' => 'alternative-decimal-separator']) ?>
											<?= $this->Form->input('bank', ['label' => 'Banco:', 'value' => 'N/A', 'disabled' => true, 'id' => 'bank-01']) ?>	
											<?= $this->Form->input('banco_receptor', ['label' => 'Banco receptor:', 'value' => 'N/A', 'disabled' => true, 'id' => 'banco-receptor-01']); ?>
											<?= $this->Form->input('account_or_card', ['label' => 'Tarjeta:', 'value' => 'N/A', 'disabled' => true, 'id' => 'account_or_card-01']) ?>
										</div>
										<div class="col-md-6">	
											<?= $this->Form->input('serial', ['label' => 'Serial:', 'value' => 'N/A', 'disabled' => true, 'id' => 'serial-01']) ?>
											<div class="form-group">
												<label for="comentario-01">Comentario:</label>
												<textarea class="form-control" rows="3" id="comentario-01"></textarea>
											</div>
											<button id="bt-01" class="record-payment btn btn-success" disabled>Registrar pago</button>
										</div>
									</div>
								</div>
                                <h3>Tarjeta de débito</h3>
								<div>
									<div class="row">
										 <label class="check-dolar" for="check1">
											<spam><input type="checkbox" class="check-dolar" checked='checked'> Dólar&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-euro" for="check1">
											<spam style="color: blue;"><input type="checkbox" class="check-euro"> COP&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-bolivar" for="check1">
											<spam style="color: red;"><input type="checkbox" class="check-bolivar"> Bolívar&nbsp;&nbsp;&nbsp;</spam>
										</label>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?= $this->Form->input('amount', ['label' => 'Monto:', 'id' => 'amount-02', 'class' => 'alternative-decimal-separator']) ?>
											<?= $this->Form->input('bank', ['label' => 'Banco emisor:', 'id' => 'bank-02', 'options' => $bancosEmisor]); ?>
											<?= $this->Form->input('banco_receptor', ['label' => 'Banco receptor:', 'id' => 'banco-receptor-02', 'options' => $bancosReceptor]); ?>
											<?= $this->Form->input('account_or_card', ['label' => 'Tarjeta:', 'id' => 'account_or_card-02']) ?>
										</div>
										<div class="col-md-6">	
											<?= $this->Form->input('serial', ['label' => 'Serial:', 'value' => 'N/A', 'disabled' => true, 'id' => 'serial-02']) ?>
											<div class="form-group">
												<label for="comentario-02">Comentario:</label>
												<textarea class="form-control" rows="3" id="comentario-02"></textarea>
											</div>
											<button id="bt-02" class="record-payment btn btn-success" disabled>Registrar pago</button>
										</div>
									</div>
								</div>
                                <h3>Tarjeta de crédito</h3>
								<div>
									<div class="row">
										 <label class="check-dolar" for="check1">
											<spam><input type="checkbox" class="check-dolar" checked='checked'> Dólar&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-euro" for="check1">
											<spam style="color: blue;"><input type="checkbox" class="check-euro"> COP&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-bolivar" for="check1">
											<spam style="color: red;"><input type="checkbox" class="check-bolivar"> Bolívar&nbsp;&nbsp;&nbsp;</spam>
										</label>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?= $this->Form->input('amount', ['label' => 'Monto:', 'id' => 'amount-03', 'class' => 'alternative-decimal-separator']) ?>
											<?= $this->Form->input('bank', ['label' => 'Banco emisor:', 'id' => 'bank-03', 'options' => $bancosEmisor]); ?>
											<?= $this->Form->input('banco_receptor', ['label' => 'Banco receptor:', 'id' => 'banco-receptor-03', 'options' => $bancosReceptor]); ?>
											<?= $this->Form->input('account_or_card', ['label' => 'Tarjeta:', 'id' => 'account_or_card-03']) ?>
										</div>
										<div class="col-md-6">		
											<?= $this->Form->input('serial', ['label' => 'Serial:', 'value' => 'N/A', 'disabled' => true, 'id' => 'serial-03']) ?>
											<div class="form-group">
												<label for="comentario-03">Comentario:</label>
												<textarea class="form-control" rows="3" id="comentario-03"></textarea>
											</div>
											<button id="bt-03" class="record-payment btn btn-success" disabled>Registrar pago</button>
										</div>
									</div>
								</div>
                                <h3>Depósito</h3>
								<div>
									<div class="row">
										 <label class="check-dolar" for="check1">
											<spam><input type="checkbox" class="check-dolar" checked='checked'> Dólar&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-euro" for="check1">
											<spam style="color: blue;"><input type="checkbox" class="check-euro"> COP&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-bolivar" for="check1">
											<spam style="color: red;"><input type="checkbox" class="check-bolivar"> Bolívar&nbsp;&nbsp;&nbsp;</spam>
										</label>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?= $this->Form->input('amount', ['label' => 'Monto:', 'id' => 'amount-04', 'class' => 'alternative-decimal-separator']) ?>
											<?= $this->Form->input('bank', ['label' => 'Banco emisor:', 'id' => 'bank-04', 'options' => $bancosEmisor]); ?>
											<?= $this->Form->input('banco_receptor', ['label' => 'Banco receptor:', 'id' => 'banco-receptor-04', 'options' => $bancosReceptor]); ?>
											<?= $this->Form->input('account_or_card', ['label' => 'Cuenta:', 'value' => 'N/A', 'disabled' => true, 'id' => 'account_or_card-04']) ?>
										</div>
										<div class="col-md-6">
											<?= $this->Form->input('serial', ['label' => 'Serial:', 'id' => 'serial-04']) ?>
											<div class="form-group">
												<label for="comentario-04">Comentario:</label>
												<textarea class="form-control" rows="3" id="comentario-04"></textarea>
											</div>
											<button id="bt-04" class="record-payment btn btn-success" disabled>Registrar pago</button>
										</div>
									</div>
								</div>								
                                <h3>Transferencia</h3>
								<div>
									<div class="row">
										 <label class="check-dolar" for="check1">
											<spam><input type="checkbox" class="check-dolar" checked='checked'> Dólar&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-euro" for="check1">
											<spam style="color: blue;"><input type="checkbox" class="check-euro"> COP&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-bolivar" for="check1">
											<spam style="color: red;"><input type="checkbox" class="check-bolivar"> Bolívar&nbsp;&nbsp;&nbsp;</spam>
										</label>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?= $this->Form->input('amount', ['label' => 'Monto:', 'id' => 'amount-05', 'class' => 'alternative-decimal-separator']) ?>
											<?= $this->Form->input('bank', ['label' => 'Banco emisor:', 'id' => 'bank-05', 'options' => $bancosEmisor]); ?>	
											<?= $this->Form->input('banco_receptor', ['label' => 'Banco receptor:', 'id' => 'banco-receptor-05', 'options' => $bancosReceptor]); ?>	
											<?= $this->Form->input('account_or_card', ['label' => 'Cuenta:', 'value' => 'N/A', 'disabled' => true, 'id' => 'account_or_card-05']) ?>
										</div>
										<div class="col-md-6">	
											<?= $this->Form->input('serial', ['label' => 'Serial:', 'id' => 'serial-05']) ?>
											<div class="form-group">
												<label for="comentario-05">Comentario:</label>
												<textarea class="form-control" rows="3" id="comentario-05"></textarea>
											</div>
											<button id="bt-05" class="record-payment btn btn-success" disabled>Registrar pago</button>
										</div>
									</div>
								</div>		
                                <h3>Cheque</h3>
								
								<div>
									<div class="row">
										 <label class="check-dolar" for="check1">
											<spam><input type="checkbox" class="check-dolar" checked='checked'> Dólar&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-euro" for="check1">
											<spam style="color: blue;"><input type="checkbox" class="check-euro"> COP&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-bolivar" for="check1">
											<spam style="color: red;"><input type="checkbox" class="check-bolivar"> Bolívar&nbsp;&nbsp;&nbsp;</spam>
										</label>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?= $this->Form->input('amount', ['label' => 'Monto:', 'id' => 'amount-06', 'class' => 'alternative-decimal-separator']) ?>
											<?= $this->Form->input('bank', ['label' => 'Banco emisor:', 'id' => 'bank-06', 'options' => $bancosEmisor]); ?>
											<?= $this->Form->input('banco_receptor', ['label' => 'Banco receptor:', 'id' => 'banco-receptor-06', 'options' => $bancosReceptor]); ?>
											<?= $this->Form->input('account_or_card', ['label' => 'Cuenta:', 'id' => 'account_or_card-06']) ?>
										</div>
										<div class="col-md-6">	
											<?= $this->Form->input('serial', ['label' => 'Serial:', 'id' => 'serial-06']) ?>
											<div class="form-group">
												<label for="comentario-06">Comentario:</label>
												<textarea class="form-control" rows="3" id="comentario-06"></textarea>
											</div>
											<button id="bt-06" class="record-payment btn btn-success" disabled>Registrar pago</button>
										</div>
									</div>
								</div>								
                                <h3>Retención de impuesto</h3>						
								<div>
									<div class="row">
										 <label class="check-dolar" for="check1">
											<spam><input type="checkbox" class="check-dolar" checked='checked'> Dólar&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-euro" for="check1">
											<spam style="color: blue;"><input type="checkbox" class="check-euro"> COP&nbsp;&nbsp;&nbsp;</spam>
										</label>
										 <label class="check-bolivar" for="check1">
											<spam style="color: red;"><input type="checkbox" class="check-bolivar"> Bolívar&nbsp;&nbsp;&nbsp;</spam>
										</label>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?= $this->Form->input('amount', ['label' => 'Monto:', 'id' => 'amount-07', 'class' => 'alternative-decimal-separator']) ?>
											<?= $this->Form->input('bank', ['label' => 'Banco:', 'value' => 'N/A', 'disabled' => true, 'id' => 'bank-07']) ?>
											<?= $this->Form->input('account_or_card', ['label' => 'Tarjeta:', 'value' => 'N/A', 'disabled' => true, 'id' => 'account_or_card-07']) ?>
											<?= $this->Form->input('banco_receptor', ['label' => 'Banco receptor:', 'value' => 'N/A', 'disabled' => true, 'id' => 'banco-receptor-07']); ?>
										</div>
										<div class="col-md-6">		
											<?= $this->Form->input('serial', ['label' => 'Serial:', 'id' => 'serial-07']) ?>
											<div class="form-group">
												<label for="comentario-06">Comentario:</label>
												<textarea class="form-control" rows="3" id="comentario-07"></textarea>
											</div>
											<button id="bt-07" class="record-payment btn btn-success" disabled>Registrar pago</button>
										</div>
									</div>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-md-7">
					<div class="row">
						<div class="col-md-12 panel panel-default">
							<br />
							<div class="table-responsive">          
								<table class="table table-striped table-hover" >
									<thead>
										<tr>
											<th scope="col" style="width:25%;">Totales factura</th>
											<th scope="col" style="width:15%;"></th>
											<th scope="col" style="width:15%; text-align:center;">Dólar ($)</th>
											<th scope="col" style="color: blue; width:15%; text-align:center;">COP (P)</th>
											<th scope="col" style="color: red; width:30%; text-align:center;">Bolívar (Bs.)</th>
										</tr>
									</thead>								
										<tbody>
											<tr>
												<td>Sub-total</td>
												<td></td>
												<td id="sub-total-dolar" style="text-align:center;"></td>
												<td style="color: blue; text-align:center;" id="sub-total-euro"></td>
												<td style="color: red; text-align:center;" id="sub-total-bolivar"></td>	
											</tr>
											<tr>
												<td>Saldo a favor/contra</td>
												<td></td>
												<td id="saldo-favor-dolar" style="text-align:center;"></td>
												<td style="color: blue; text-align:center;" id="saldo-favor-euro"></td>
												<td style="color: red; text-align:center;" id="saldo-favor-bolivar"></td>
											</tr>
											<tr>	
												<td><?= $this->Form->input('descuento_recargo', ['label' => 'Descuento/Recargo:', 'id' => 'descuento-recargo', 'disabled' => 'true', 'options' => 
													[null => '',
													'Descuento $' => 'Descuento: $',
													'Descuento %' => 'Descuento: %',
													'Recargo $' => 'Recargo: $',
													'Recargo %' => 'Recargo: %']]); ?></td>	
												<td><?= $this->Form->input('cantidad_descuento', ['label' => 'Cantidad:', 'type' => 'text', 'id' => 'cantidad-descuento', 'value' => 0, 'disabled' => 'true', 'class' => 'alternative-decimal-separator']); ?></td>													
												<td id="descuento-recargo-dolar" style="text-align:center; vertical-align: middle;">0</td>
												<td style="color: blue; text-align:center; vertical-align: middle;" id="descuento-recargo-euro">0</td>
												<td style="color: red; text-align:center; vertical-align: middle;" id="descuento-recargo-bolivar">0</td>
											</tr>
											<tr>
												<td>Iva 16%</td>
												<td></td>
												<td style="text-align:center;">0,00</td>
												<td style="color: blue; text-align:center;">0,00</td>
												<td style="color: red; text-align:center;">0,00</td>
											</tr>
											<tr>
												<td>Total</td>
												<td></td>
												<td id="total-balance-descuento-dolar" style="text-align:center;"></td>
												<td style="color: blue; text-align:center;" id="total-balance-descuento-euro"></td>
												<td style="color: red; text-align:center;" id="total-balance-descuento-bolivar"></td>
											</tr>
											<tr>	
												<td>Pagado</td>
												<td></td>
												<td id="pagado-dolar" style="text-align:center;"></td>
												<td style="color: blue; text-align:center;" id="pagado-euro"></td>
												<td style="color: red; text-align:center;" id="pagado-bolivar"></td>
											</tr>
											<tr>
												<td>Por pagar</td>
												<td></td>
												<td id="por-pagar-dolar" style="text-align:center;"></td>
												<td style="color: blue; text-align:center;" id="por-pagar-euro"></td>
												<td style="color: red; text-align:center;" id="por-pagar-bolivar"></td>
											</tr>
											<tr>
												<td>Sobrante</td>
												<td></td>
												<td id="sobrante-dolar" style="text-align:center;"></td>
												<td style="color: blue; text-align:center;" id="sobrante-euro"></td>
												<td style="color: red; text-align:center;" id="sobrante-bolivar"></td>																		
											</tr>
										</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p>
								<button id="ajuste-automatico" class="btn btn-success" disabled>Ajuste</button>
								<button id="print-invoice" class="btn btn-success" disabled>Guardar factura</button>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 panel panel-default">
							<br />
							<p><b>Pagos realizados:</b></p>
							<div class="panel-body">
								<div class="table-responsive">          
									<table class="table table-striped table-hover" >
										<thead>
											<tr>
												<th scope="col" style="color:red;">&nbsp;(x)&nbsp;</th>
												<th scope="col">Forma&nbsp;de&nbsp;pago&nbsp;&nbsp;</th>
												<th scope="col">Moneda</th>
												<th scope="col">Monto</th>
												<th scope="col">&nbsp;&nbsp;Banco emisor&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th scope="col">&nbsp;&nbsp;Banco receptor&nbsp;&nbsp;&nbsp;&nbsp;</th>
												<th scope="col">Cuenta&nbsp;o&nbsp;tarjeta</th>
												<th scope="col">Serial</th>
												<th scope="col">Comentario</th>
											</tr>
										</thead>
										<tbody id="registered-payments"></tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
<button id="mostrar-registros" type=submit>Tabla studentTransactions</button>
<button id="mostrar-pagos" type=submit>Tabla payments</button>
<button id="prueba-ajuste">Prueba ajuste</button>
<div id="mensajes"></div>
<div id="results"></div>
<div id="pagos"></div>
<script>
//  Declaración de variables
	var crm_processing_modal = function ( msg ) 
	{
	    var process_modal ='<div class="modal fade" id="fave_modal" tabindex="-1" role="dialog" aria-labelledby="faveModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-body houzez_messages_modal">'+msg+'</div></div></div></div></div>';
    	$('body').append(process_modal);
        $('#fave_modal').modal();
    }

	var crm_processing_modal_close = function ( ) 
	{
		$('#fave_modal').modal('hide');
	}

    var idFamily = 0;
    var nameFamily = " ";
    var selectFamily = -1;
	var typeStudent = 0;
    var customerEmail = " ";
    var totalBalance = 0;
	var totalBalanceEuros = 0;
	var totalBalanceBolivares = 0;
	var saldoPagosRealizados = 0;
	var discountMode = '';
	var discountAmount = 0;
	var discount = 0;
	var tipoDescuento = '';
	var descuentoEuros = 0;
	var descuentoBolivares = 0; 
	var balanceDescuento = 0;
	var balanceDescuentoEuros = 0;
	var balanceDescuentoBolivare = 0;
	var totalBalanceDescuento = 0
	var totalBalanceDescuentoEuros = 0
	var totalBalanceDescuentoBolivares = 0	
	var totalGeneral = 0;
	var invoiceDescuento = 0;
    var totalBill = 0;
    var paymentType = " ";
    var amountPaid = 0;
	var montoPagado = 0;
	var montoPagadoDolar = 0;
	var montoPagadoEuro = 0;
	var montoPagadoBolivar = 0;
    var bank = " ";
	var bancoReceptor = "";
    var accountOrCard = " ";
    var serial = " ";
    var balance = 0;
    var balanceIndicator = 0;
    var accumulatedPayment = 0;
    var acumuladoPagadoEuros = 0;
    var acumuladoPagadoBolivares = 0;
    var accountantPaid = 0;
    var accountant = 1;
    var linePayments = " ";
    var valid = true;
    var studentBalance = 0.00;
    var indicatorUpdateAmount = 0;
    var paymentNumber = " ";
    var change = 0;
    var invoiceLine = " ";
    var amountConcept = 0;
    var transactionCounter = 0;
    var conceptCounter = 0;
    var accountPaid = 0;
    var idParentsandguardians = 0; 
    var reversedDate = " ";
	var schoolYearFrom = 0;
	var biggestYearFrom = 0;
	var biggestYearUntil = 0;

    var selectedStudent = -1;
    var idStudent = 0;
    var studentName = " ";
    var scholarship = 0;
    var studentTransactions = "";
    var transactionIdentifier = 0;
    var monthlyPayment = " ";
	var tarifaDolar = 0;
	var tarifaDolarSinDescuento = 0;
	var montoPendienteDolar = 0;
	var montoAPagarDolar = 0;
	var montoAPagarEuro = 0;
	var montoAPagarBolivar = 0;
	var montoDolar = 0;
    var transactionAmount = 0;
	var tempAmount = 0;
    var originalAmount = 0;
    var invoiced = 0;
    var partialPayment = 0;
    var paidOut = 0;
	var dollarExchangeRate = 0;
	var amountMonthly = 0;
	var discountFamily = 0;
	var transactionType = "";
    var firstName = " ";
    var secondName = " ";
    var surname = " ";
    var secondSurname = " ";
    var concept = " ";
    var idStudentTransactions = " ";
	var idAmountTransactions = "";
    var amountPayable = 0;
    var selectedPayment = -1;
    var grade = " ";
	var nivelEstudioAplicar = '';
	var nivelTarifa = '';
	var nivelEstudioActual = ''; 
	var	nivelEstudioPasado = ''; 
	var	nivelEstudioAntepasado = ''; 
    var section = " ";
	var temporalMontoBolivar = 0;
	var saldoNotaCredito = 0;
	var euro = 0;
	var saldoRepresentante = 0;
	var saldoRepresentanteSigno = 0;
	var saldoRepresentanteEuros = 0;
	var saldoRepresentanteSignoEuros = 0;
	var saldoRepresentanteBolivares = 0;
	var saldoRepresentanteSignoBolivares = 0;
	var indicadorCompensacion = 0;
	var deudaMenosPagado = 0;
	var deudaMenosPagadoEuros = 0;
	var deudaMenosPagadoDolares = 0;
	var porPagar = 0;
	var porPagarEuros = 0;
	var porPagarBolivares = 0;
	var sobrante = 0;
	var sobranteEuros = 0;
	var sobranteBolivares = 0;
	var monedaPago = "$";
	var comentario = "";
	var monedaPagoEliminar = "";
	var indicadorAjuste = 0;
	var indicadorNoCuotas = 0;
	var contadorCuotasSeleccionadas = 0;
	var imprimirReciboSobrante = 0;
	var tasaTemporalDolar = 0;
	var tasaTemporalEuro = 0;
	var cuotasAlumnoBecado = 0;
	var cambioMontoCuota = 0;
	var morosoAnoAnterior = 0;
	var julioAnoAnterior = "";
	var julioExonerado = 0;
	var diferenciaBolivares = 0;
	var becadoAnoAnterior = 0;
	var descuentoAnoAnterior = 0;
	var anoEscolarActual = <?= $anoEscolarActual ?>;
	var anoEscolarAnterior = <?= $anoEscolarActual - 1 ?>;
	var anoEscolarInscripcion = <?= $anoEscolarInscripcion ?>;
	var anoEscolarMensualidad = 0;
	
    var db = openDatabase("sanGabrielSqlite", "1.0", "San Gabriel Sqlite", 200000000);  // Open SQLite Database
    var dataSet;

    var payments = new Object();
    payments.idTurn = 0;
    payments.idParentsandguardians = 0;
    payments.invoiceDate = " ";
    payments.schoolYear = " ";
    payments.client = " ";
    payments.typeOfIdentificationClient = " ";
    payments.identificationNumberClient = " ";
    payments.fiscalAddress = " ";
    payments.taxPhone = " ";
    payments.invoiceAmount = 0;
	payments.discount = 0;
    payments.fiscal = 0;
	payments.tasaDolar = 0;
	payments.tasaEuro = 0;
	payments.tasaDolarEuro = 0;
	payments.saldoRepresentante = 0;
	payments.sobrante = 0;
	payments.imprimirReciboSobrante = 0;
	payments.tasaTemporalDolar = 0;
	payments.tasaTemporalEuro = 0;
	payments.cuotasAlumnoBecado = 0;
	payments.cambioMontoCuota = 0;

    var tbStudentTransactions = new Array();
    var tbConcepts = new Array();
    var tbPaymentsMade = new Array();
	
// Funciones

    function log(message) 
    {
        if (totalBalance > 0)
        {    
            var r = confirm("Si selecciona otro representante, perderá los datos del cobro realizado a: " + nameFamily );
            if (r == false)
            {
                return false;
            }
        }

        cleanPager();
        $("#response-container").html("");
        $("#response-container").html(message);
        
        disableButtons();
    }
    
    function disableButtons()
    {
        $("#mark-quotas").text("cobrar");
        $("#mark-quotas").attr('disabled', true);
        $("#uncheck-quotas").attr('disabled', true);
		$("#adjust-fee").attr('disabled', true);
		$("#descuento-recargo").attr('disabled', true);
		$("#cantidad-descuento").attr('disabled', true);
        $("#ajuste-automatico").attr('disabled', true);
        $("#print-invoice").attr('disabled', true);
        $("#bt-01").attr('disabled', true);
        $("#bt-02").attr('disabled', true);
        $("#bt-03").attr('disabled', true);
        $("#bt-04").attr('disabled', true);
        $("#bt-05").attr('disabled', true);
        $("#bt-06").attr('disabled', true);
        $("#bt-07").attr('disabled', true);
    }
	
    function habilitaBotones()
    {
        $("#mark-quotas").attr('disabled', false);
        $("#uncheck-quotas").attr('disabled', false);
		$("#adjust-fee").attr('disabled', false);
		$("#descuento-recargo").attr('disabled', false);
		$("#cantidad-descuento").attr('disabled', false);
        $("#ajuste-automatico").attr('disabled', false);
        $("#print-invoice").attr('disabled', false);
        $("#bt-01").attr('disabled', false);
        $("#bt-02").attr('disabled', false);
        $("#bt-03").attr('disabled', false);
        $("#bt-04").attr('disabled', false);
        $("#bt-05").attr('disabled', false);
        $("#bt-06").attr('disabled', false);
        $("#bt-07").attr('disabled', false);
    }
    
    function deshabilitarBotonesAjuste()
    {
        $("#mark-quotas").attr('disabled', true);
		$("#uncheck-quotas").attr('disabled', true);
        $("#uncheck-quotas").attr('disabled', true);
		$("#adjust-fee").attr('disabled', true);
		$("#descuento-recargo").attr('disabled', true);
		$("#cantidad-descuento").attr('disabled', true);
        $("#ajuste-automatico").attr('disabled', true);
        $("#bt-01").attr('disabled', true);
        $("#bt-02").attr('disabled', true);
        $("#bt-03").attr('disabled', true);
        $("#bt-04").attr('disabled', true);
        $("#bt-05").attr('disabled', true);
        $("#bt-06").attr('disabled', true);
        $("#bt-07").attr('disabled', true);
		$(".registeredPayments").attr('disabled', true);	
    }
	
    function habilitarBotonesAjuste()
    {
        $("#mark-quotas").attr('disabled', false);
		$("#uncheck-quotas").attr('disabled', false);
        $("#uncheck-quotas").attr('disabled', false);
		$("#adjust-fee").attr('disabled', false);
		$("#descuento-recargo").attr('disabled', false);
		$("#cantidad-descuento").attr('disabled', false);
        $("#ajuste-automatico").attr('disabled', false);
        $("#bt-01").attr('disabled', false);
        $("#bt-02").attr('disabled', false);
        $("#bt-03").attr('disabled', false);
        $("#bt-04").attr('disabled', false);
        $("#bt-05").attr('disabled', false);
        $("#bt-06").attr('disabled', false);
        $("#bt-07").attr('disabled', false);
    }
	
    function markStudent(id)
    {
        $('#st' + id + ' td').each(function ()
        {
            $(this).css('background-color', '#c2c2d6'); 
        });
    }
    
    function uncheckStudent(id)
    {
        $('#st' + id + ' td').each(function ()
        {
            $(this).css('background-color', 'white'); 
        });
    }
    
    function markTransaction(id)
    {
        $('#tra' + id + ' td').each(function ()
        {
            $(this).css('background-color', '#c2c2d6'); 
        });
    }
    
    function uncheckTransaction(id)
    {
        $('#tra' + id + ' td').each(function ()
        {
            $(this).css('background-color', 'white'); 
        });
    }

    function cleanPager()
    {
        dropTable();
        dropPayments();

		$('#family-search').val(" ");
        $("#date-and-time").val(" ");
        $('#client').val(" ");
        $('#type-of-identification-client').val("");
		$('#identification-number-client').val("");		
        $('#fiscal-address').val(" ");
        $('#tax-phone').val(" ");
        $('#email').val(" ");
        $("#header-messages").html("");
        $("#student-messages").html("");
        $("#invoice-messages").html("");
        $("#related-students").html("");
        $("#student-name").html("");
        $("#monthly-payment").html("");
        $("#student-concept").text(" ");
        $("#invoice-lines").text(" ");
        $("#registered-payments").text(" ");
        $("#student-balance").html("");
        $("#total-balance").html("");
		$("#total-general").html("");
		$("#total-general-bolivar").html("");
		$("#invoice-descuento").html("");
        $("#invoice-subtotal").html(" ");
        $("#total-bill").html(" ");
        $('#paid-out').text(" ");
        $('#to-pay').text(" ");
        $('#change').text(" ");
		$('.mensajes-usuario').html("");
		$('.campo-resaltado').css('background-color', "white");
		$('#nota-credito').html("");
		$("#nota-credito").removeClass("noverScreen");
		$("#botones-cuotas").removeClass("noverScreen");
		$("#botones-notas").addClass("noverScreen");
		$('#descuento-recargo').val(null);		
		$('#cantidad-descuento').val(0);
		$("#sub-total-dolar").html("");
		$("#sub-total-euro").html("");
		$("#sub-total-bolivar").html("");
		$("#saldo-favor-dolar").html("");
		$("#saldo-favor-euro").html("");
		$("#saldo-favor-bolivar").html("");
		$("#descuento-recargo-dolar").html("");
		$("#descuento-recargo-euro").html("");
		$("#descuento-recargo-bolivar").html("");
		$("#total-balance-descuento-dolar").html("");
		$("#total-balance-descuento-euro").html("");
		$("#total-balance-descuento-bolivar").html("");
		$("#pagado-dolar").html("");
		$("#pagado-euro").html("");
		$("#pagado-bolivar").html("");
		$("#por-pagar-dolar").html("");
		$("#por-pagar-euro").html("");
		$("#por-pagar-bolivar").html("");
		$("#sobrante-dolar").html("");
		$("#sobrante-euro").html("");
		$("#sobrante-bolivar").html("");

        for (var i = 0, item = 0; i < 7; i++)
        {
            item = i + 1;
            paymentNumber = "0" + item;

            $("#amount-" + paymentNumber).css('background-color', '#ffffff');
            $("#amount-" + paymentNumber).val(0);
			$("#comentario-" + paymentNumber).css('background-color', '#ffffff');
            $('#comentario-' + paymentNumber).val(null);
            
            if (item > 1 && item < 4)
            {
                $("#bank-" + paymentNumber).css('background-color', '#ffffff');
                $('#bank-' + paymentNumber).val(null);
                $("#banco-receptor-" + paymentNumber).css('background-color', '#ffffff');
                $('#banco-receptor-' + paymentNumber).val(null);
                $("#account_or_card-" + paymentNumber).css('background-color', '#ffffff');
                $('#account_or_card-' + paymentNumber).val(null);
            }
            else if (item > 3 && item < 6)
            {
                $("#bank-" + paymentNumber).css('background-color', '#ffffff');
                $('#bank-' + paymentNumber).val(null);
                $("#banco-receptor-" + paymentNumber).css('background-color', '#ffffff');
                $('#banco-receptor-' + paymentNumber).val(null);
                $("#serial-" + paymentNumber).css('background-color', '#ffffff');
                $('#serial-' + paymentNumber).val(null);
            }
            else if (item == 6)
            {
                $("#bank-" + paymentNumber).css('background-color', '#ffffff');
                $('#bank-' + paymentNumber).val(null);
                $("#banco-receptor-" + paymentNumber).css('background-color', '#ffffff');
                $('#banco-receptor-' + paymentNumber).val(null);
                $("#account_or_card-" + paymentNumber).css('background-color', '#ffffff');
                $('#account_or_card-' + paymentNumber).val(null);
                $("#serial-" + paymentNumber).css('background-color', '#ffffff');
                $('#serial-' + paymentNumber).val(null);
            }
            else if (item == 7)
            {
                $("#serial-" + paymentNumber).css('background-color', '#ffffff');
                $('#serial-' + paymentNumber).val(null);
            }
        }    

        studentBalance = 0;
        totalBalance = 0;
		discount = 0;
		discountMode = '';
		discountAmount = 0;
		totalGeneral = 0;
        totalBill = 0;
		invoiceDescuento = 0;
        accumulatedPayment = 0;
        balance = 0;
        balanceIndicator = 0;
		saldoNotaCredito = 0;
		indicadorCompensacion = 0;
		
    }
    
    function validateFields()
    {
        if($("#amount-" + paymentIdentifier).val().length < 1) 
        {  
            $("#amount-" + paymentIdentifier).css('background-color', '#f2f2f2');
            alert("El monto es obligatorio");
            return false;
        }
        if($("#bank-" + paymentIdentifier).val().length < 1) 
        {  
            $("#bank-" + paymentIdentifier).css('background-color', '#f2f2f2');
            alert("El nombre del banco emisor es obligatorio");
            return false;
        }
        if($("#banco-receptor-" + paymentIdentifier).val().length < 1) 
        {  
            $("#banco-receptor-" + paymentIdentifier).css('background-color', '#f2f2f2');
            alert("El nombre del banco receptor es obligatorio");
            return false;
        }
        if($("#account_or_card-" + paymentIdentifier).val().length < 1) 
        {  
            $("#account_or_card-" + paymentIdentifier).css('background-color', '#f2f2f2');
            alert("El Nro. de tarjeta o cuenta es obligatorio");
            return false;
        }
        if($("#serial-" + paymentIdentifier).val().length < 1) 
        {  
            $("#serial-" + paymentIdentifier).css('background-color', '#f2f2f2');
            alert("El serial de la transacción es obligatorio");
            return false;
        }
    }
	
	function checkPredeterminado()
	{
		monedaPago = "$";
		$('.check-dolar').attr('checked', true);
		$('.check-dolar').prop('checked', true);
		$('.check-euro').attr('checked', false);
		$('.check-euro').prop('checked', false);
		$('.check-bolivar').attr('checked', false);
		$('.check-bolivar').prop('checked', false);
	}

    function updateAmount()
    {       
        if (deudaMenosPagado > 0)
        {
			aCobrar = deudaMenosPagado;
		}
		else
		{
			aCobrar = 0;
		}
		$('#amount-01').val(formatoNumero(aCobrar)).css("color", "black");
		$('#amount-02').val(formatoNumero(aCobrar)).css("color", "black");
		$('#amount-03').val(formatoNumero(aCobrar)).css("color", "black");
		$('#amount-04').val(formatoNumero(aCobrar)).css("color", "black");
		$('#amount-05').val(formatoNumero(aCobrar)).css("color", "black");
		$('#amount-06').val(formatoNumero(aCobrar)).css("color", "black");
		$('#amount-07').val(formatoNumero(aCobrar)).css("color", "black");
	}
	
    function aCobrarEuros()
    {       
        if (deudaMenosPagadoEuros > 0)
        {
			aCobrar = deudaMenosPagadoEuros;
		}
		else
		{
			aCobrar = 0;
		}
		$('#amount-01').val(formatoNumero(aCobrar)).css("color", "blue");
		$('#amount-02').val(formatoNumero(aCobrar)).css("color", "blue");
		$('#amount-03').val(formatoNumero(aCobrar)).css("color", "blue");
		$('#amount-04').val(formatoNumero(aCobrar)).css("color", "blue");
		$('#amount-05').val(formatoNumero(aCobrar)).css("color", "blue");
		$('#amount-06').val(formatoNumero(aCobrar)).css("color", "blue");
		$('#amount-07').val(formatoNumero(aCobrar)).css("color", "blue");
	}
	
    function aCobrarBolivares()
    {       
        if (deudaMenosPagado > 0)
        {
			aCobrar = deudaMenosPagadoBolivares;
		}
		else
		{
			aCobrar = 0;
		}
		$('#amount-01').val(formatoNumero(aCobrar)).css("color", "red");
		$('#amount-02').val(formatoNumero(aCobrar)).css("color", "red");
		$('#amount-03').val(formatoNumero(aCobrar)).css("color", "red");
		$('#amount-04').val(formatoNumero(aCobrar)).css("color", "red");
		$('#amount-05').val(formatoNumero(aCobrar)).css("color", "red");
		$('#amount-06').val(formatoNumero(aCobrar)).css("color", "red");
		$('#amount-07').val(formatoNumero(aCobrar)).css("color", "red");
	}
	
	function inicializarCampos()
	{
		$("#amount-" + paymentIdentifier).css('background-color', '#ffffff');
		$("#comentario-" + paymentIdentifier).css('background-color', '#ffffff');
		$('#comentario-' + paymentIdentifier).val(null);
		if (paymentType != 'Efectivo')
		{
			if (paymentType == 'Retención de impuesto')
			{
				$("#serial-" + paymentIdentifier).css('background-color', '#ffffff');
				$('#serial-' + paymentIdentifier).val(null);
			}
			else if (paymentType == 'Tarjeta de débito' || paymentType == 'Tarjeta de crédito')
			{
				$("#bank-" + paymentIdentifier).css('background-color', '#ffffff');
				$('#bank-' + paymentIdentifier).val(null);
                $("#banco-receptor-" + paymentNumber).css('background-color', '#ffffff');
                $('#banco-receptor-' + paymentNumber).val(null);
				$("#account_or_card-" + paymentIdentifier).css('background-color', '#ffffff');
				$('#account_or_card-' + paymentIdentifier).val(null);
			}
			else if (paymentType == 'Transferencia' || paymentType == 'Depósito')
			{
				$("#bank-" + paymentIdentifier).css('background-color', '#ffffff');
				$('#bank-' + paymentIdentifier).val(null);
                $("#banco-receptor-" + paymentNumber).css('background-color', '#ffffff');
                $('#banco-receptor-' + paymentNumber).val(null);
				$("#serial-" + paymentIdentifier).css('background-color', '#ffffff');
				$('#serial-' + paymentIdentifier).val(null);
			}
			else
			{
				$("#bank-" + paymentIdentifier).css('background-color', '#ffffff');
				$('#bank-' + paymentIdentifier).val(null);
                $("#banco-receptor-" + paymentNumber).css('background-color', '#ffffff');
                $('#banco-receptor-' + paymentNumber).val(null);
				$("#account_or_card-" + paymentIdentifier).css('background-color', '#ffffff');
				$('#account_or_card-' + paymentIdentifier).val(null);
				$("#serial-" + paymentIdentifier).css('background-color', '#ffffff');
				$('#serial-' + paymentIdentifier).val(null);
			}
		}
    }

    function initDataBase()  // Function Call When Page is ready.
    {
        try 
        {
            if (!window.openDatabase)  // Check browser is supported SQLite or not.
            {
                alert('Databases are not supported in this browser.');
            }
            else 
            {
                createTable();  // If supported then call Function for create table in SQLite
                createTablePayments();
            }
        }
     
        catch(e) 
        {
            if (e == 2) 
            {
                console.log("Invalid database version.");
            } 
            else 
            {
                console.log("Unknown error " + e + ".");
            }
            return;
        }
    }
     
    function createTable()  // Function for Create Table in SQLite.
    {
        var createStatement = "CREATE TABLE IF NOT EXISTS studentTransactions \
        (dbId INTEGER PRIMARY KEY, \
        dbIdStudent INTEGER, \
        dbStudentName VARCHAR(250), \
        dbMonthlyPayment VARCHAR(100), \
        dbScholarship INTEGER, \
		dbDescuentoAlumno DECIMAL(15,2), \
		dbMorosoAnoAnterior INTEGER, \
		dbTasaCambioDolar DECIMAL(15,2), \
		dbTasaCambioEuro DECIMAL(15,2), \
		dbTarifaDolarOriginal DECIMAL(15,2), \
		dbTarifaDolar DECIMAL(15,2), \
		dbMontoAbonadoDolar DECIMAL(15,2), \
		dbMontoPendienteDolar DECIMAL(15,2), \
		dbMontoAPagarDolar DECIMAL(15,2), \
		dbMontoAPagarEuro DECIMAL(15,2), \
		dbMontoAPagarBolivar DECIMAL(15,2), \
        dbInvoiced INTEGER, \
        dbPartialPayment INTEGER, \
        dbPaidOut INTEGER, \
		dbSchoolYearFrom INTEGER, \
        dbObservation VARCHAR(100))";

        db.transaction(function (tx) { tx.executeSql(createStatement, [], null, onError); });
    }

    function createTablePayments()  
    {
        var createPayments = "CREATE TABLE IF NOT EXISTS payments \
        (payId INTEGER PRIMARY KEY, \
		payMoneda VARCHAR(50), \
        payPaymentType VARCHAR(100), \
        payAmountPaid DECIMAL(15,2), \
        payBank VARCHAR(200), \
		payBancoReceptor VARCHAR(200), \
        payAccountOrCard VARCHAR(50), \
        paySerial VARCHAR (50), \
		payComentario VARCHAR(250))";

        db.transaction(function (tx) { tx.executeSql(createPayments, [], null, onError); });
    }

    function insertRecord() // Get value from Input and insert record . Function Call when Save/Submit Button Click..
    {
        var insertStatement = "INSERT OR REPLACE INTO studentTransactions \
        (dbId, \
        dbIdStudent, \
        dbStudentName, \
        dbMonthlyPayment, \
        dbScholarship, \
		dbDescuentoAlumno, \
		dbMorosoAnoAnterior, \
		dbTasaCambioDolar, \
		dbTasaCambioEuro, \
		dbTarifaDolarOriginal, \
		dbTarifaDolar, \
		dbMontoAbonadoDolar, \
		dbMontoPendienteDolar, \
		dbMontoAPagarDolar, \
		dbMontoAPagarEuro, \
		dbMontoAPagarBolivar, \
        dbInvoiced, \
        dbPartialPayment, \
        dbPaidOut, \
		dbSchoolYearFrom, \
        dbObservation) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        var tpId = transactionIdentifier;
        var tpIdStudent = idStudent;
        var tpStudentName = studentName + " - " + grade;
        var tpMonthlyPayment = monthlyPayment;
        var tpScholarship = scholarship;
		var tpDescuentoAlumno = discountFamily;
		var tpMorosoAnoAnterior = morosoAnoAnterior;
		var tpTasaCambioDolar = dollarExchangeRate;
		var tpTasaCambioEuro = euro;
		var tpTarifaDolarOriginal = tarifaDolar;
		var tpTarifaDolar = tarifaDolar;
		var tpAbonadoDolar = montoDolar;
		var tpPendienteDolar = montoPendienteDolar;
		var tpAPagarDolar = montoAPagarDolar;
		var tpAPagarEuro = montoAPagarEuro;
		var tpAPagarBolivar = montoAPagarBolivar;
        var tpInvoiced = invoiced;
        var tpPartialPayment = partialPayment;
        var tpPaidOut = paidOut;
		var tpSchoolYearFrom = schoolYearFrom;
        var tpObservation = " ";

        db.transaction(function (tx) 
        {
            tx.executeSql(insertStatement, 
            [tpId,
            tpIdStudent,
            tpStudentName,
            tpMonthlyPayment,
            tpScholarship,
			tpDescuentoAlumno,
			tpMorosoAnoAnterior,
			tpTasaCambioDolar,
			tpTasaCambioEuro,
			tpTarifaDolarOriginal,
			tpTarifaDolar,
			tpAbonadoDolar,
			tpPendienteDolar,
			tpAPagarDolar,
			tpAPagarEuro,
			tpAPagarBolivar,
            tpInvoiced,
            tpPartialPayment,
            tpPaidOut,
			tpSchoolYearFrom,
            tpObservation], null, onError); 
        });
		
		if (montoPendienteDolar < 0 && monthlyPayment.substring(0, 18) != "Servicio educativo")
		{
			saldoNotaCredito = saldoNotaCredito + montoPendienteDolar;
		}
		
		// Esta condición se utilizó para atender la denuncia de la SUNDDE, está sin efecto. Por esa razón se comentó 
		/* if (monthlyPayment == "Ago 2020" && montoDolar == 40)
		{
			saldoNotaCredito = saldoNotaCredito - 10;
		} */
    }
    
    function insertRecordPayments() // Get value from Input and insert record . Function Call when Save/Submit Button Click..
    {
        var insertPayments = "INSERT OR REPLACE INTO payments \
        (payId, \
		payMoneda, \
        payPaymentType, \
        payAmountPaid, \
        payBank, \
		payBancoReceptor, \
        payAccountOrCard, \
        paySerial, \
		payComentario) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

        var tpId = accountant;
		var tpMoneda = monedaPago;
        var tpPaymentType = paymentType;
        var tpAmountPaid = montoPagado;
        var tpBank = bank;
		var tpBancoReceptor = bancoReceptor;
        var tpAccountOrCard = accountOrCard;
        var tpSerial = serial
		var tpComentario = comentario; 

        db.transaction(function (tx) 
        {
            tx.executeSql(insertPayments, 
            [tpId, 
			tpMoneda,
            tpPaymentType, 
            tpAmountPaid,
            tpBank,
			tpBancoReceptor,
            tpAccountOrCard,
            tpSerial,
			tpComentario], null, onError);
        });
    }
    
    function deletePayment(locIdPayment) 
    {
        var deletePayment = "DELETE FROM payments WHERE payId=?";
        db.transaction(function (tx) 
        { 
            tx.executeSql(deletePayment, [locIdPayment], null, onError);
        });
    }
 
    function updateRecord(id, invoiced) 
    {
        var updateStatement = "UPDATE studentTransactions SET dbInvoiced = ? WHERE dbId=?";
		
        db.transaction(function (tx) { tx.executeSql(updateStatement, [invoiced, Number(id)], null, onError); });
    }
    
    function updateInstallment(id, updOriginalMontoDolar, updMontoModificadoDolar, updMontoPendienteDolar, updAPagarDolar, updAPagarEuro, updAPagarBolivar, updObservation) 
    {
        var updateStatement = "UPDATE studentTransactions SET dbTarifaDolarOriginal = ?, dbTarifaDolar = ?, dbMontoPendienteDolar = ?, dbMontoAPagarDolar = ?, dbMontoAPagarEuro = ?, dbMontoAPagarBolivar = ?, dbObservation = ? WHERE dbId=?";
     		
        db.transaction(function (tx) { tx.executeSql(updateStatement, [Number(updOriginalMontoDolar), Number(updMontoModificadoDolar), Number(updMontoPendienteDolar), Number(updAPagarDolar), Number(updAPagarEuro), Number(updAPagarBolivar), updObservation, Number(id)], null, onError); });
    }
	
    function actualizarPagar(id, actAPagarDolar, actAPagarEuro, actAPagarBolivar, actInvoiced, actObservacion) 
    {
        var updateStatement = "UPDATE studentTransactions SET dbMontoAPagarDolar = ?, dbMontoAPagarEuro = ?, dbMontoAPagarBolivar = ?, dbInvoiced = ?, dbObservation = ? WHERE dbId=?";
        
        db.transaction(function (tx) { tx.executeSql(updateStatement, [Number(actAPagarDolar), Number(actAPagarEuro), Number(actAPagarBolivar), actInvoiced, actObservacion, Number(id)], null, onError); });
    }
	
    function showRecords() // Function For Retrive data from Database Display records as list
    {	
        var selectWithCondition = "SELECT * FROM studentTransactions WHERE dbIdStudent = ?";
        var detailLine = "";
        var nextPayment = "";
        var indicatorPaid = 0;
        var firstInstallment = "";
        var lastInstallment = "";
        studentBalance = 0;
		     	 			 
        db.transaction(function (tx) 
        {
            tx.executeSql(selectWithCondition, [idStudent], function (tx, result) 
            {
                dataSet = result.rows;
                
                for (var i = 0, item = null; i < dataSet.length; i++) 
                {
                    item = dataSet.item(i);
					                    
                    if (i == 0)
                    {
                        if (item['dbScholarship'] == 1)
                        {
							if ($('#type-invoice').val() == 'Mensualidades')
							{
								alert("Este alumno es becado, no se le deben cobrar cuotas");
								return false;
							}
                        }
                        if (item['dbMorosoAnoAnterior'] == 1)
                        {
							if ($('#type-invoice').val() == 'Factura inscripción regulares' || $('#type-invoice').val() == 'Recibo inscripción regulares')
							{
								alert("Este alumno no se debe inscribir hasta que pague la mensualidad de julio");
								return false;
							}
                        }						
                        studentName = item['dbStudentName'];
                    }
                    
                    monthlyPayment = item['dbMonthlyPayment'];

                    if (item['dbPaidOut'] == 'false')
                    {
                        if (item['dbInvoiced'] == "true")
                        {
							studentBalance = studentBalance + item['dbMontoAPagarDolar'];
							detailLine += "<tr id=tra" + item['dbId'] + "> \
								<td style='background-color:#c2c2d6;'><input type='checkbox' id=tr" + item['dbId'] + " name='" + item['dbMonthlyPayment'] + "' value=" + item['dbMontoPendienteDolar'] + " checked='checked' disabled></td> \
								<td style='background-color:#c2c2d6;'>" + item['dbMonthlyPayment'] + "</td> \
								<td style='background-color:#c2c2d6;'><input type='text' id=am" + item['dbId'] + " class='form-control modifiable-fee alternative-decimal-separator' value=" + formatoNumero(item['dbTarifaDolar']) + " disabled></td> \
								<td style='background-color:#c2c2d6;'><input type='text' class='form-control amount-paid' value=" + formatoNumero(item['dbMontoAbonadoDolar']) + " disabled></td>";
		
							if (item['dbMontoPendienteDolar'] < 0)
							{
								detailLine += 	"<td style='background-color:#c2c2d6; color: red;'>" + formatoNumero(item['dbMontoPendienteDolar']) + "</td> \
												<td style='background-color:#c2c2d6; color: red;'>" + formatoNumero(item['dbMontoAPagarDolar']) + "</td> \
												<td style='background-color:#c2c2d6; color: red;'>" + formatoNumero(item['dbMontoAPagarEuro']) + "</td> \
												<td style='background-color:#c2c2d6; color: red;'>" + formatoNumero(item['dbMontoAPagarBolivar']) + "</td> \
												<td style='background-color:#c2c2d6; color: red;'>Hacer NC</td> \
												<td><input type='number' class='form-control original-amount noverScreen' value=" + item['dbTarifaDolar'] + "></td><td></td></tr>";
							}
							else
							{
								detailLine += 	"<td style='background-color:#c2c2d6;'>" + formatoNumero(item['dbMontoPendienteDolar']) + "</td> \
												<td style='background-color:#c2c2d6;'>" + formatoNumero(item['dbMontoAPagarDolar']) + "</td> \
												<td style='background-color:#c2c2d6; color: blue;'>" + formatoNumero(item['dbMontoAPagarEuro']) + "</td> \
												<td style='background-color:#c2c2d6; color: red;'>" + formatoNumero(item['dbMontoAPagarBolivar']) + "</td> \
												<td style='background-color:#c2c2d6;'>" + item['dbObservation'] + "</td> \
												<td><input type='number' class='form-control original-amount noverScreen' value=" + item['dbTarifaDolar'] + "></td><td></td></tr>";
							}
							
							$('#uncheck-quotas').attr('disabled', false);
							
							if (firstInstallment == "")
							{
								firstInstallment = item['dbMonthlyPayment'];
							}
							lastInstallment = item['dbMonthlyPayment'];
						}
						else
						{
							if (indicatorPaid == 0)
							{
								nextPayment = monthlyPayment;
								indicatorPaid = 1;                            
							}
							detailLine += "<tr id=tra" + item['dbId'] + "> \
								<td><input type='checkbox' id=tr" + item['dbId'] + " name='" + item['dbMonthlyPayment'] + "' value=" + item['dbMontoPendienteDolar'] + " disabled></td> \
								<td>" + item['dbMonthlyPayment'] + "</td> \
								<td><input type='text' id=am" + item['dbId'] + " class='form-control modifiable-fee alternative-decimal-separator' value=" + formatoNumero(item['dbTarifaDolar']) + "></td> \
								<td><input type='text' class='form-control amount-paid' value=" + formatoNumero(item['dbMontoAbonadoDolar']) + " disabled></td>";
		
							if (item['dbMontoPendienteDolar'] < 0)
							{
								detailLine += 	"<td style='color: red;'>" + item['dbMontoPendienteDolar'] + "</td> \
												<td style='color: red;'>" + item['dbMontoAPagarDolar'] + "</td> \
												<td style='color: red;'>" + item['dbMontoAPagarEuro'] + "</td> \
												<td style='color: red;'>" + item['dbMontoAPagarBolivar'] + "</td> \
												<td style='color: red;'>Hacer NC</td> \
												<td><input type='number' class='form-control original-amount noverScreen' value=" + item['dbTarifaDolar'] + "></td><td></td></tr>";
							}
							else
							{
								detailLine += 	"<td>" + formatoNumero(item['dbMontoPendienteDolar']) + "</td> \
												<td>" + formatoNumero(item['dbMontoAPagarDolar']) + "</td> \
												<td style='color: blue;'>" + formatoNumero(item['dbMontoAPagarEuro']) + "</td> \
												<td style='color: red;'>" + formatoNumero(item['dbMontoAPagarBolivar']) + "</td> \
												<td>" + item['dbObservation'] + "</td> \
												<td><input type='number' class='form-control original-amount noverScreen' value=" + item['dbTarifaDolar'] + "></td><td></td></tr>";
							}
						}
                    }
                }
                $("#monthly-payment").html(detailLine);
				$(".alternative-decimal-separator").numeric({ altDecimal: "," });
                if (nextPayment == "" && studentBalance == 0)
                {
                    disableButtons();
                    alert('No existen cuotas a pagar de este alumno');
                }
                else
                {
					habilitaBotones();
                    $("#student-name").html(studentName);
                    $("#student-concept").text('(' + firstInstallment + ' - ' + lastInstallment + ')');
                    concept = firstInstallment + ' - ' + lastInstallment;
                    $("#student-balance").html(formatoNumero(studentBalance));

					$("#mark-quotas").html(nextPayment);  
					
					if (indicadorAjuste == 0)
					{
						$("#mark-quotas").attr('disabled', false);
						$("#adjust-fee").attr('disabled', false);
					}
					else
					{
						deshabilitarBotonesAjuste();
					}
					
					if (saldoNotaCredito < 0)
					{
						$("#nota-credito").html("<spam style='text-align: center; font-size: 18px; color: red;'><b>Estimado usuario no puede facturar hasta que haga una o más notas de crédito (SUNDDE) por un total de " + -1 * saldoNotaCredito + " $</b></spam>");
						$("#botones-cuotas").addClass("noverScreen");
						$("#print-invoice").attr('disabled', true);
						$("#ajuste-automatico").attr('disabled', true);
						$(".record-payment").attr('disabled', true);
					}
					else if (saldoRepresentante > 0)
					{
						if (indicadorCompensacion == 0)
						{
							$("#nota-credito").html("<spam style='text-align: center; font-size: 18px; color: blue;'><b>Estimado usuario, este representante tiene un saldo a favor/contra de " + saldoRepresentante + " $ ¿Quiere usarlo para compensar el pago de las cuotas?</b></spam>");
							$("#print-invoice").attr('disabled', true);
							$("#ajuste-automatico").attr('disabled', true);
							$(".record-payment").attr('disabled', true);							
							$("#botones-cuotas").addClass("noverScreen");
							$("#botones-notas").removeClass("noverScreen");
							$("#saldo-favor-dolar").html(saldoRepresentanteSigno);
							$("#saldo-favor-euro").html(formatoNumero(saldoRepresentanteSigno * tasaDolarEuro));
							$("#saldo-favor-bolivar").html(formatoNumero(saldoRepresentante * dollarExchangeRate));
						}
					}
                }
            });
        });
    }

    function showDatabase() // Function For Retrive data from Database Display records as list
    {
        var selectAllStatement = "SELECT * FROM studentTransactions";
        var detailLine = " ";
        
        db.transaction(function (tx) 
        {
            tx.executeSql(selectAllStatement, [], function (tx, result) 
            {
                dataSet = result.rows;
                
                for (var i = 0, item = null; i < dataSet.length; i++) 
                {
                    item = dataSet.item(i);
                    detailLine += "<li>" + item['dbId'] 
                    + " id "
                    + item['dbIdStudent']
                    + " Alumno " 
                    + item['dbStudentName']
                    + " Cuota "
                    + item['dbMonthlyPayment'] 
                    + " Becado "
                    + item['dbScholarship'] 
                    + " tasaCambioDolar "
                    + item['dbTasaCambioDolar']
                    + " tasaCambioEuro "
                    + item['dbTasaCambioEuro']	
                    + " tarifaDolarOriginal "
                    + item['dbTarifaDolarOriginal']					
                    + " tarifaDolar "
                    + item['dbTarifaDolar']
                    + " AbonadoDolar "
                    + item['dbMontoAbonadoDolar'] 	
                    + " PendienteDolar "
                    + item['dbMontoPendienteDolar'] 					
                    + " APagarDolar "
                    + item['dbMontoAPagarDolar']
                    + " APagarEuro "
                    + item['dbMontoAPagarEuro']
                    + " APagarBolivar "
                    + item['dbMontoAPagarBolivar']
                    + " Seleccionada "
                    + item['dbInvoiced']
                    + " Pagada "
                    + item['dbPaidOut']
                    + " Año escolar "
                    + item['dbSchoolYearFrom']
                    + " Observacion "
                    + item['dbObservation']
                    + "</li>";
                }
                $("#results").html(detailLine);
            });
        });
    }
	
    function ajustarCuotas() 
    {
		if (discountMode == "Porcentaje")
		{
			alert("Estimado usuario, no se puede hacer el ajustar la factura si el descuento es un porcentaje. Por favor cambie el descuento a un monto fijo y después haga el ajuste")
			return false;
		}
		
        confirmar = confirm('Estimado usuario, después que ajuste la factura no podrá realizar cambios. ¿Está seguro de que desea ajustar la factura?');
        if (confirmar == false)
        {
            return false;
        }
		
		saldoPagosRealizados = dosDecimales(accumulatedPayment + saldoRepresentante - discount);
		
		totalBalance = 0;
				
        var selectAllStatement = "SELECT * FROM studentTransactions WHERE dbInvoiced = ?";
        
        db.transaction(function (tx) 
        {
            tx.executeSql(selectAllStatement, ["true"], function (tx, result) 
            {
                dataSet = result.rows;
				                
                for (var i = 0, item = null; i < dataSet.length; i++) 
                {					
                    item = dataSet.item(i);

					if (saldoPagosRealizados == 0)
					{
						updateRecord(item['dbId'], 'false');
					}
					else if (saldoPagosRealizados < item['dbMontoPendienteDolar'])
					{
						saldoPagosRealizadosEuros = dosDecimales(saldoPagosRealizados * tasaDolarEuro);
						saldoPagosRealizadosBolivares = dosDecimales(saldoPagosRealizados * dollarExchangeRate);
						
						actualizarPagar(item['dbId'], saldoPagosRealizados, saldoPagosRealizadosEuros, saldoPagosRealizadosBolivares, 'true', 'Abono');
						totalBalance = totalBalance + saldoPagosRealizados;
						saldoPagosRealizados = 0;
						indicadorAjuste = 1;
					}
					else
					{
						saldoPagosRealizados = dosDecimales(saldoPagosRealizados - item['dbMontoPendienteDolar']);
						totalBalance = dosDecimales(totalBalance + item['dbMontoPendienteDolar']);
					}
                }
				if (saldoPagosRealizados > 0)
				{
					db.transaction(function (tx) 
					{
						tx.executeSql(selectAllStatement, ["false"], function (tx, result) 
						{
							dataSet = result.rows;
							
							if (dataSet.length == 0)
							{
								indicadorNoCuotas = 1;
								alert("No hay cuotas disponibles para ajustar la factura");
								return false;
							}
							else
							{               
								for (var i = 0, item = null; i < dataSet.length; i++) 
								{
									item = dataSet.item(i);
									
									if (saldoPagosRealizados >= item['dbMontoPendienteDolar']) 
									{
										updateRecord(item['dbId'], 'true');
										saldoPagosRealizados = dosDecimales(saldoPagosRealizados - item['dbMontoPendienteDolar']);
										totalBalance = dosDecimales(totalBalance + item['dbMontoPendienteDolar']);
									}
									else if (saldoPagosRealizados > 0 && saldoPagosRealizados < item['dbMontoPendienteDolar'])
									{
										saldoPagosRealizadosEuros = dosDecimales(saldoPagosRealizados * tasaDolarEuro);
										saldoPagosRealizadosBolivares = dosDecimales(saldoPagosRealizados * dollarExchangeRate);
										
										actualizarPagar(item['dbId'], saldoPagosRealizados, saldoPagosRealizadosEuros, saldoPagosRealizadosBolivares, 'true', 'Abono');
										totalBalance = totalBalance + saldoPagosRealizados;
										saldoPagosRealizados = 0;
										indicadorAjuste = 1;
									}
								}
								if (saldoPagosRealizados > 0)
								{
									alert("No hay cuotas disponibles para ajustar la factura");
									return false;
								}
								else
								{
									showRecords();
									actualizarTotales();
								}
							}
						});
					});			
				}
				else
				{
					showRecords();
					actualizarTotales();
				}
            });
        });
    }
		
    function restaurarMontos() 
    {
        var selectAllStatement = "SELECT * FROM studentTransactions WHERE dbObservation = ?";
		        
        db.transaction(function (tx) 
        {
            tx.executeSql(selectAllStatement, ["Abono"], function (tx, result) 
            {
                dataSet = result.rows;
				                
                for (var i = 0, item = null; i < dataSet.length; i++) 
                {
                    item = dataSet.item(i);				
					actualizarPagar(item['dbId'], item['dbMontoPendienteDolar'], item['dbMontoPendienteDolar'] * tasaDolarEuro, item['dbMontoPendienteDolar'] * dollarExchangeRate, "");
                }
				indicadorAjuste = 0;
            });
        });
    }
	
    function showPayments() 
    {
        var selectAllPayments = "SELECT * FROM payments";
        var detailLine = " ";
        
        db.transaction(function (tx) 
        {
            tx.executeSql(selectAllPayments, [], function (tx, result) 
            {
                dataSet = result.rows;
                
                for (var i = 0, item = null; i < dataSet.length; i++) 
                {
                    item = dataSet.item(i);
                    detailLine += "<li>" 
					+ "id "
                    + item['payId'] 
                    + " Moneda "
                    + item['payMoneda']
                    + " Tipo "
                    + item['payPaymentType']
                    + " Pagado " 
                    + item['payAmountPaid']
                    + " Banco "
                    + item['payBank'] 
                    + " Tarjeta "
                    + item['payAccountOrCard']
                    + " Serial "
                    + item['paySerial']
                    + " Comentario "
                    + item['payComentario']					
                    + "</li>";
                }
                $("#pagos").html(detailLine);
            });
        });
    }
	
    function buscarMoneda(idPago) 
    {
        var selectAllPayments = "SELECT * FROM payments WHERE payId = ?";
        var detailLine = "";
        
        db.transaction(function (tx) 
        {
            tx.executeSql(selectAllPayments, [idPago], function (tx, result) 
            {
                dataSet = result.rows;
				                
                for (var i = 0, item = null; i < dataSet.length; i++) 
                {
                    item = dataSet.item(i);
					monedaPagoEliminar = item['payMoneda'];
													
					if (monedaPagoEliminar == "$")
					{
						montoPagadoDolar = montoPagado;
						montoPagadoEuro = dosDecimales(montoPagado * tasaDolarEuro);
						montoPagadoBolivar = dosDecimales(montoPagado * dollarExchangeRate);
					}
					else if (monedaPagoEliminar == "P")
					{
						montoPagadoDolar = dosDecimales(montoPagado / tasaDolarEuro);
						montoPagadoEuro = montoPagado;
						montoPagadoBolivar = dosDecimales((montoPagado / tasaDolarEuro) * dollarExchangeRate);
					}
					else
					{
						montoPagadoDolar = dosDecimales(montoPagado / dollarExchangeRate);
						montoPagadoEuro = dosDecimales((montoPagado / dollarExchangeRate) * tasaDolarEuro);
						montoPagadoBolivar = montoPagado;
					}
														
					accumulatedPayment -= dosDecimales(montoPagadoDolar);	
					acumuladoPagadoEuros -= dosDecimales(montoPagadoEuro);
					acumuladoPagadoBolivares -= dosDecimales(montoPagadoBolivar);
					
					actualizarTotales();						
                }
            });
        });
    }
	
    function dropTable() // Function Call when Drop Button Click.. Talbe will be dropped from database.
    {
        var dropStatement = "DROP TABLE IF EXISTS studentTransactions";

        db.transaction(function (tx) { tx.executeSql(dropStatement, [], null, onError); });
        initDataBase();
    }
    
    function dropPayments() // Function Call when Drop Button Click.. Talbe will be dropped from database.
    {
        var dropPayments = "DROP TABLE IF EXISTS payments";

        db.transaction(function (tx) { tx.executeSql(dropPayments, [], null, onError); });
        initDataBase();
    }

    function onError(tx, error) // Function for Hendeling Error...
    {
        alert(error.message);
    }

    function printPayments()
    {
        linePayments = " ";
	        
        linePayments += "<tr id=pa" + accountant + "> \
            <td><button id=p" + accountant + " name='" + paymentType + "' value=" + montoPagado + " class='registeredPayments glyphicon glyphicon-trash'></button></td> \
			<td style='text-align: center;'>" + paymentType + "</td>";
			
		if (monedaPago == "$")
		{
			linePayments += "<td style='text-align: center;'>" + monedaPago + "</td><td style='text-align: center;'>" + formatoNumero(montoPagado) + "</td>";
		}
		else if (monedaPago == "P")
		{
			linePayments += "<td style='color: blue; text-align: center;'>" + monedaPago + "</td><td style='color: blue; text-align: center;'>" + formatoNumero(montoPagado) + "</td>";
		}
		else
		{
			linePayments += "<td style='color: red; text-align: center;'>" + monedaPago + "</td><td style='color: red; text-align: center;'>" + formatoNumero(montoPagado) + "</td>";
		}
		
		linePayments +=
            "<td style='text-align: center;'>" + bank + "</td> \
			<td style='text-align: center;'>" + bancoReceptor + "</td> \
            <td style='text-align: center;'>" + accountOrCard + "</td> \
            <td style='text-align: center;'>" + serial + "</td> \
			<td style='text-align: left;'>" + comentario + "</td></tr>";
			
        $("#registered-payments").append(linePayments);
        
        insertRecordPayments();
        
        accountant++;
    }
    
    function activarBotonesPago()
    {
        $("#bt-01").attr('disabled', false);
        $("#bt-02").attr('disabled', false);
        $("#bt-03").attr('disabled', false);
        $("#bt-04").attr('disabled', false);
        $("#bt-05").attr('disabled', false);
        $("#bt-06").attr('disabled', false);
        $("#bt-07").attr('disabled', false);
    }
	
    function desactivarBotonesPago()
    {
        $("#bt-01").attr('disabled', true);
        $("#bt-02").attr('disabled', true);
        $("#bt-03").attr('disabled', true);
        $("#bt-04").attr('disabled', true);
        $("#bt-05").attr('disabled', true);
        $("#bt-06").attr('disabled', true);
        $("#bt-07").attr('disabled', true);
    }
	
    function showInvoiceLines()
    {
        var selectForInvoice = "SELECT * FROM studentTransactions WHERE dbInvoiced = 'true' ORDER BY dbStudentName";
        var detailLine = " ";
        var previousStudentName = " ";
        var currentStudentName = " ";

        db.transaction(function (tx) 
        {
            tx.executeSql(selectForInvoice, [], function (tx, result) 
            {
                dataSet = result.rows;
                    
                for (var i = 0, item = null; i < dataSet.length; i++) 
                {
                    item = dataSet.item(i);
                    
                    if (previousStudentName != item['dbStudentName'])
                    {
                        previousStudentName = item['dbStudentName'];
                        currentStudentName = item['dbStudentName'];
                    }
                    else 
                    {
                        currentStudentName = " ";
                    }
                    decAmount = parseFloat(item['dbAmountPayable']).toFixed(2);
                    detailLine += "<tr id=fact" + item['dbId'] + ">  \
                        <td>" + currentStudentName + "</td> \
                        <td>" + item['dbMonthlyPayment'] + "</td> \
                        <td id=fac" + item['dbId'] + " value=" + item['dbTransactionAmount'] + ">" + item['dbTransactionAmount'] + "</td> \
                        <td><input type='number' id=fa" + item['dbId'] + " name='" + item['dbMonthlyPayment'] + "' value=" + decAmount + "></td> \
                        <td>" + item['dbObservation'] + "</td></tr>";
                }
                $("#invoice-lines").html(detailLine);
            });
        });
    }

    function uploadTransactions()
    {
		biggestYearFrom = schoolYearFrom;
		
        var selectForInvoice = "SELECT * FROM studentTransactions WHERE dbInvoiced = 'true'";
		var idCuotaAbono = 0;
		var idCuotaExonerada = 0;
		var cantidadElementos = 0;
		var diferenciaBolivaresDividida = diferenciaBolivares;
		var diferenciaUltimoElemento = diferenciaBolivares;
		var diferenciaBolivaresTotal = diferenciaBolivares;
		var contadorElementos = 1;
		
        db.transaction(function (tx) 
        {
            tx.executeSql(selectForInvoice, [], function (tx, result) 
            {
                dataSet = result.rows;
				cantidadElementos = dataSet.length;

				for (var i = 0, item = null; i < dataSet.length; i++) 
				{
					item = dataSet.item(i);				
					
					if (item['dbObservation'] == 'Abono')
					{
						idCuotaAbono = item['dbId'];
					}
					
					if (item['dbObservation'] == '(Exonerado)')
					{
						idCuotaAbono = item['dbId'];
						cantidadElementos -= 1;
					}
				}
				
				if (cantidadElementos > 1)
				{
					diferenciaBolivaresDividida = dosDecimales(diferenciaBolivares / cantidadElementos);
					diferenciaUltimoElemento = diferenciaBolivaresDividida;
					
					diferenciaBolivaresTotal = dosDecimales(diferenciaBolivaresDividida * cantidadElementos);
					
					if (diferenciaBolivares != diferenciaBolivaresTotal)
					{
						diferenciaUltimoElemento = dosDecimales(diferenciaUltimoElemento + (diferenciaBolivares - diferenciaBolivaresTotal));
					}
				}
			 
                for (var i = 0, item = null; i < dataSet.length; i++) 
                {
                    item = dataSet.item(i);
                    tbStudentTransactions[transactionCounter] = new Object();
                    tbStudentTransactions[transactionCounter].studentName = item['dbStudentName'];
                    tbStudentTransactions[transactionCounter].transactionIdentifier = item['dbId'];
					tbStudentTransactions[transactionCounter].descuentoAlumno = item['dbDescuentoAlumno'];
					tbStudentTransactions[transactionCounter].tarifaDolarOriginal = item['dbTarifaDolarOriginal'];
					tbStudentTransactions[transactionCounter].tarifaDolar = item['dbTarifaDolar'];
                    tbStudentTransactions[transactionCounter].monthlyPayment = item['dbMonthlyPayment'];
					tbStudentTransactions[transactionCounter].montoAPagarDolar = dosDecimales(item['dbMontoAPagarDolar']);
                    tbStudentTransactions[transactionCounter].montoAPagarEuro = dosDecimales(item['dbMontoAPagarEuro']);
					
					if (item['Observation'] == '(Exonerado')
					{
						tbStudentTransactions[transactionCounter].montoAPagarBolivar = dosDecimales(item['dbMontoAPagarBolivar']);	
					}
					else if (cantidadElementos == 1)
					{
						tbStudentTransactions[transactionCounter].montoAPagarBolivar = dosDecimales(item['dbMontoAPagarBolivar'] + diferenciaBolivares);
					}
					else if (idCuotaAbono > 0)
					{
						if (item['dbId'] == idCuotaAbono)
						{
							tbStudentTransactions[transactionCounter].montoAPagarBolivar = dosDecimales(item['dbMontoAPagarBolivar'] + diferenciaBolivares);
						}
						else
						{
							tbStudentTransactions[transactionCounter].montoAPagarBolivar = dosDecimales(item['dbMontoAPagarBolivar']);	
						}													
					}
					else
					{
						if (contadorElementos == cantidadElementos)
						{
							tbStudentTransactions[transactionCounter].montoAPagarBolivar = dosDecimales(item['dbMontoAPagarBolivar'] + diferenciaUltimoElemento);
						}
						else
						{
							tbStudentTransactions[transactionCounter].montoAPagarBolivar = dosDecimales(item['dbMontoAPagarBolivar'] + diferenciaBolivaresDividida);
						}
					}
					contadorElementos++;
										
                    tbStudentTransactions[transactionCounter].observation = item['dbObservation']; 	
					
                    transactionCounter++;
					
					if (item['dbMonthlyPayment'].substring(0, 9) == "Matrícula")
					{
						biggestYearFrom = parseInt(item['dbMonthlyPayment'].substring(10, 14));
					}
					else if (item['dbMonthlyPayment'].substring(0, 3) == "Sep")
					{
						biggestYearFrom = parseInt(item['dbMonthlyPayment'].substring(4, 8));
					}

					if (item['dbScholarship'] == 1 || item['dbDescuentoAlumno'] < 1)
					{
						cuotasAlumnoBecado++;
					}
                }
				biggestYearUntil = biggestYearFrom + 1;
				payments.schoolYear = "Año escolar " + biggestYearFrom + "-" + biggestYearUntil;
            });
        });
    }
    
    function loadPayments()
    {
        var locSelectAllPayments = "SELECT * FROM payments";

        db.transaction(function (tx) 
        {
            tx.executeSql(locSelectAllPayments, [], function (tx, result) 
            {
                dataSet = result.rows;
                
                for (var i = 0, item = null; i < dataSet.length; i++) 
                {
                    item = dataSet.item(i);
                    
                    if (item['payPaymentType'] != "Cambio")
                    {
                        tbPaymentsMade[accountPaid] = new Object();
                        tbPaymentsMade[accountPaid].id = item['payId'];
						tbPaymentsMade[accountPaid].moneda = item['payMoneda'];
                        tbPaymentsMade[accountPaid].paymentType = item['payPaymentType'];
                        tbPaymentsMade[accountPaid].amountPaid = item['payAmountPaid'];
                        tbPaymentsMade[accountPaid].bank = item['payBank'];
						tbPaymentsMade[accountPaid].bancoReceptor = item['payBancoReceptor'];
                        tbPaymentsMade[accountPaid].accountOrCard = item['payAccountOrCard'];
                        tbPaymentsMade[accountPaid].serial = item['paySerial'];
						tbPaymentsMade[accountPaid].comentario = item['payComentario'];
                        tbPaymentsMade[accountPaid].idTurn = $("#Turno").attr('value');
                        tbPaymentsMade[accountPaid].family = nameFamily;
                        accountPaid++;						
                    }
                }
				
				payments.cuotasAlumnoBecado = cuotasAlumnoBecado;
				
                var stringStudentTransactions = JSON.stringify(tbStudentTransactions);
                                
                var stringPaymentsMade = JSON.stringify(tbPaymentsMade);

                cleanPager();
				
                $.redirect('<?php echo Router::url(["controller" => "Bills", "action" => "recordInvoiceData"]); ?>', {headboard : payments, studentTransactions : stringStudentTransactions, paymentsMade : stringPaymentsMade }); 
            });
        });
    }
    
    function listFamilies(newFamily)
    {	
        $.post('<?php echo Router::url(["controller" => "Students", "action" => "everyFamily"]); ?>', {"newFamily" : newFamily}, null, "json")
            
        .done(function(response) 
        {
            if (response.success) 
            {
                var output = " "; 
                $.each(response.data.families, function(key, value) 
                {
                    $.each(value, function(userkey, uservalue) 
                    {
                        if (userkey == 'id')
                            output += "<tr id=fa" + uservalue + " class='family'><td>";
                        else if (userkey == 'family')
                            output += uservalue + " (";
                        else if (userkey == 'surname')
                            output += uservalue + " ";
                        else
                            output += uservalue + ")</td></tr>";
                    });
                });
                $("#header-messages").html("");
                $("#response-container").html(output);
            } 
            else 
            {
				$("#header-messages").html("");
                $("#response-container").html('No ha habido suerte: ' + response.data.message);
            }
                
        })
        .fail(function(jqXHR, textStatus, errorThrown) 
		{
			$("#header-messages").html("");        
            $("#response-container").html("Algo ha fallado: " + textStatus);
                
        });
    }
	
	function validarDatosFiscales()
	{
		var resultado = 0;
		
		$('.mensajes-usuario').html("");
		$('.campo-resaltado').css('background-color', "white");
		
		if ($("#client").val().length < 5) 
		{  		
			$('#client').css('background-color', "#ffffe6");
			$('#mensaje-cliente').html("El nombre o razón social está incompleto").css('color', 'red');
			resultado = 1;
		}

		if ($("#type-of-identification-client").val().length == 0) 
		{  		
			$('#type-of-identification-client').css('background-color', "#ffffe6");
			$('#mensaje-tipo-de-identificacion').html("El tipo de identificacion no puede ser blancos").css('color', 'red');
			resultado = 1;
		}
		else
		{
			if ($("#type-of-identification-client").val() == "J" || $("#type-of-identification-client").val() == "G") 
			{
				if ($("#identification-number-client").val().length < 9) 
				{	
					$('#identification-number-client').css('background-color', "#ffffe6");
					$('#mensaje-numero-identificacion-cliente').html("El número del RIF está incompleto").css('color', 'red');
					resultado = 1;
				}
			}
			else
			{
				if ($("#identification-number-client").val().length < 7) 
				{	
					$('#identification-number-client').css('background-color', "#ffffe6");
					$('#mensaje-numero-identificacion-cliente').html("El número de cédula o pasaporte está incompleto").css('color', 'red');
					resultado = 1;
				}				
			}	
		}
		if ($("#fiscal-address").val().length < 10) 
		{	
			$('#fiscal-address').css('background-color', "#ffffe6");
			$('#mensaje-direccion-fiscal').html("La dirección está incompleta").css('color', 'red');
			resultado = 1;
		}	

		if ($("#tax-phone").val().length < 10) 
		{	
			$('#tax-phone').css('background-color', "#ffffe6");
			$('#mensaje-telefono').html("El número de teléfono está incompleto").css('color', 'red');
			resultado = 1;
		}
		return resultado;
	}
	
	function actualizarTotales()
	{
		signoDescuento = 1;
		descuentoPrevio = 0;
		
		$("#student-balance").html(formatoNumero(studentBalance));
		$("#total-balance").html(formatoNumero(totalBalance));
		
		totalBalanceEuros = dosDecimales(totalBalance * tasaDolarEuro);
		totalBalanceBolivares = dosDecimales(totalBalance * dollarExchangeRate);
	
		$("#sub-total-dolar").html(formatoNumero(totalBalance));
		$("#sub-total-euro").html(formatoNumero(totalBalanceEuros));
		$("#sub-total-bolivar").html(formatoNumero(totalBalanceBolivares));
				
		if (discountMode == 'Porcentaje')
		{
			if (discountAmount < 0)
			{
				signoDescuento = -1;
				descuentoPrevio = dosDecimales(discountAmount * signoDescuento);
			}
			else
			{
				descuentoPrevio = discountAmount;
			}
			discount = dosDecimales(totalBalance * descuentoPrevio);
			discount = dosDecimales(discount * signoDescuento);
		}
		else
		{
			discount = discountAmount;		
		}
		
		descuentoEuros = dosDecimales(discount * tasaDolarEuro);
		descuentoBolivares = dosDecimales(discount * dollarExchangeRate);
						
		$("#descuento-recargo-dolar").html(formatoNumero(discount));
		$("#descuento-recargo-euro").html(formatoNumero(descuentoEuros));
		$("#descuento-recargo-bolivar").html(formatoNumero(descuentoBolivares));

		balanceDescuento = dosDecimales(totalBalance + discount);
		totalBalanceDescuento = dosDecimales(totalBalance - saldoRepresentante + discount);

		balanceDescuentoEuros = dosDecimales(balanceDescuento * tasaDolarEuro);
		totalBalanceDescuentoEuros = dosDecimales(totalBalanceDescuento * tasaDolarEuro);

		balanceDescuentoBolivares = dosDecimales(totalBalanceBolivares + descuentoBolivares);
		totalBalanceDescuentoBolivares = dosDecimales(totalBalanceBolivares - saldoRepresentanteBolivares + descuentoBolivares);
		
		$("#total-balance-descuento-dolar").html(formatoNumero(totalBalanceDescuento));
		$("#total-balance-descuento-euro").html(formatoNumero(totalBalanceDescuentoEuros));
		$("#total-balance-descuento-bolivar").html(formatoNumero(totalBalanceDescuentoBolivares));
		
		$('#pagado-dolar').html(formatoNumero(accumulatedPayment));
		$('#pagado-euro').html(formatoNumero(acumuladoPagadoEuros));
		$('#pagado-bolivar').html(formatoNumero(acumuladoPagadoBolivares));
		
		deudaMenosPagado = dosDecimales(totalBalanceDescuento - accumulatedPayment);
		deudaMenosPagadoEuros = dosDecimales(deudaMenosPagado * tasaDolarEuro);
		deudaMenosPagadoBolivares = dosDecimales(totalBalanceDescuentoBolivares - acumuladoPagadoBolivares);

		if (deudaMenosPagado > 0)
		{
			porPagar = deudaMenosPagado;
			sobrante = 0;
		}
		else if (deudaMenosPagado < 0)
		{
			porPagar = 0;
			if (saldoRepresentante < balanceDescuento)
			{
				sobrante = dosDecimales(deudaMenosPagado * -1);
			}
			else
			{
				sobrante = 0;
			}
		}
		else
		{
			porPagar = 0;
			sobrante = 0;
		}
		
		porPagarEuros = dosDecimales(parseFloat(porPagar.toFixed(2)) * tasaDolarEuro);
		sobranteEuros = dosDecimales(parseFloat(sobrante.toFixed(2)) * tasaDolarEuro);
			
		porPagarBolivares = dosDecimales(parseFloat(porPagar.toFixed(2)) * dollarExchangeRate);
		sobranteBolivares = dosDecimales(parseFloat(sobrante.toFixed(2)) * dollarExchangeRate);
		
		$('#por-pagar-dolar').html(formatoNumero(porPagar));
		$('#por-pagar-euro').html(formatoNumero(porPagarEuros));
		$('#por-pagar-bolivar').html(formatoNumero(porPagarBolivares));				
		
		$('#sobrante-dolar').html(formatoNumero(sobrante));
		$('#sobrante-euro').html(formatoNumero(sobranteEuros));
		$('#sobrante-bolivar').html(formatoNumero(sobranteBolivares));
			
		checkPredeterminado();
		updateAmount();
		
		if (contadorCuotasSeleccionadas > 0)
		{
			$("#ajuste-automatico").attr('disabled', false);
			$("#print-invoice").attr('disabled', false);
		}
		else
		{
			$("#ajuste-automatico").attr('disabled', true);
			$("#print-invoice").attr('disabled', true);			
		}
		
		if (totalBalanceDescuento > 0)
		{
			activarBotonesPago();
		}
		else
		{
			desactivarBotonesPago();
		}
	}
	
	function guardarFactura()
	{		
		$("#invoice-messages").html("Por favor espere...");
		payments.idTurn = $("#Turno").attr('value');
		payments.idParentsandguardians = idParentsandguardians;
		payments.invoiceDate = reversedDate;
		payments.client = $('#client').val();
		payments.typeOfIdentificationClient = $('#type-of-identification-client').val();
		payments.identificationNumberClient = $('#identification-number-client').val();;
		payments.fiscalAddress = $('#fiscal-address').val();
		payments.taxPhone = $('#tax-phone').val();
						
		if (deudaMenosPagadoBolivares == 0)
		{
			payments.invoiceAmount = dosDecimales(totalBalance * dollarExchangeRate);
		}
		else
		{
			if (deudaMenosPagadoBolivares < 0)
			{
				diferenciaSinSigno = deudaMenosPagadoBolivares * -1;
			}
			else
			{
				diferenciaSinSigno = deudaMenosPagadoBolivares;
			}
			
			if (diferenciaSinSigno < dosDecimales(0.01 * dollarExchangeRate))
			{
				diferenciaBolivares = deudaMenosPagadoBolivares * -1;
				payments.invoiceAmount = dosDecimales((totalBalance * dollarExchangeRate) + diferenciaBolivares);
			}
			else
			{
				payments.invoiceAmount = dosDecimales(totalBalance * dollarExchangeRate);
			}
		}
		
		payments.discount = descuentoBolivares; 
		
		if ($('#type-invoice').val() == 'Recibo inscripción regulares' || $('#type-invoice').val() == 'Recibo inscripción nuevos')
		{
			payments.fiscal = 0;
		}
		else
		{
			payments.fiscal = 1;
		}
		payments.tasaDolar = dollarExchangeRate;
		payments.tasaEuro = euro;
		payments.tasaDolarEuro = dosDecimales(tasaDolarEuro);
		if (saldoRepresentante > totalBalance)
		{
			payments.saldoCompensado = totalBalance;
		}
		else
		{
			payments.saldoCompensado = saldoRepresentante;		
		}
		payments.sobrante = sobrante;
		payments.imprimirReciboSobrante = imprimirReciboSobrante;
		payments.tasaTemporalDolar = tasaTemporalDolar;
		payments.tasaTemporalEuro = tasaTemporalEuro;
		payments.cambioMontoCuota = cambioMontoCuota;
		
		uploadTransactions();
		loadPayments();
	}
	
	function actualizarDescuentos()
	{
		discountMode = "Fijo";
		discountAmount = 0;
		
		if ($('#cantidad-descuento').val() < 0)
		{
			alert("Estimado usuario debe escribir una cantidad mayor a cero");
			return false;	
		}		
		else if ($('#cantidad-descuento').val() == "" || $('#cantidad-descuento').val() == 0)
		{
			actualizarTotales();
		}
		else if ($('#descuento-recargo').val() === "")
		{
			alert("Estimado usuario debe seleccionar el tipo de descuento o recargo");
			return false;				
		}
		else if ($('#descuento-recargo').val() == "Descuento $")
		{						
			discountMode = "Fijo";
			discountAmount = dosDecimales(parseFloat($('#cantidad-descuento').val()) * -1);
			actualizarTotales();	
		}
		else if ($('#descuento-recargo').val() == "Descuento %")
		{
			discountMode = "Porcentaje";
			discountAmount = dosDecimales((parseFloat($('#cantidad-descuento').val()) / 100) * -1);
			actualizarTotales();
		}	
		else if ($('#descuento-recargo').val() == "Recargo $")
		{						
			discountMode = "Fijo";
			discountAmount = dosDecimales(parseFloat($('#cantidad-descuento').val()));
			actualizarTotales();	
		}
		else if ($('#descuento-recargo').val() == "Recargo %")
		{
			discountMode = "Porcentaje";
			discountAmount = dosDecimales(parseFloat($('#cantidad-descuento').val()) / 100);
			actualizarTotales();
		}	
	}
	
	function formatoNumero(num) 
	{
		if (!num || num == 'NaN') return '0,00';
		if (num == 'Infinity') return '&#x221e;';
		num = num.toString().replace(/\$|\,/g, '');
		if (isNaN(num))
			num = "0";
		sign = (num == (num = Math.abs(num)));
		num = Math.floor(num * 100 + 0.50000000001);
		cents = num % 100;
		num = Math.floor(num / 100).toString();
		if (cents < 10)
			cents = "0" + cents;
		for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3) ; i++)
			num = num.substring(0, num.length - (4 * i + 3)) + '.' + num.substring(num.length - (4 * i + 3));
		return (((sign) ? '' : '-') + num + ',' + cents);
	}
		
	function dosDecimales(numero)
	{
		var result = Math.round(numero * 100) / 100 ;
		return result;
	}
	
	function eliminarComa(cadenaRecibida)
	{
		var indicadorNoPuntos = 0;
		var cadena = "";
		var cadenaConvertida = "";
	
		if (cadenaRecibida.indexOf(",") != -1)
		{	
			cadena = cadenaRecibida;
			
			while (indicadorNoPuntos < 1)
			{
				if (cadena.indexOf(".") != -1)
				{
					cadenaConvertida = cadena.replace(".", "");
					cadena = cadenaConvertida;
				}
				else
				{
					indicadorNoPuntos = 1
					if (cadenaConvertida == "")
					{
						cadenaConPuntoDecimal = cadena.replace(",", ".");
					}
					else
					{
						cadenaConPuntoDecimal = cadenaConvertida.replace(",", ".");
					}
				}
			}
		}
		else
		{
			cadenaConPuntoDecimal = cadenaRecibida;
		}
		return cadenaConPuntoDecimal;	
	}

	function procesarPago()
	{
		if (monedaPago == "$")
		{
			montoPagadoDolar = montoPagado;
			montoPagadoEuro = dosDecimales(montoPagado * tasaDolarEuro);
			montoPagadoBolivar = dosDecimales(montoPagado * dollarExchangeRate);
		}
		else if (monedaPago == "P")
		{
			montoPagadoDolar = dosDecimales(montoPagado / tasaDolarEuro);
			montoPagadoEuro = montoPagado;
			montoPagadoBolivar = dosDecimales((montoPagado / tasaDolarEuro) * dollarExchangeRate);
		}
		else
		{
			montoPagadoDolar = dosDecimales(montoPagado / dollarExchangeRate);
			montoPagadoEuro = ((montoPagado / dollarExchangeRate) * tasaDolarEuro);
			montoPagadoBolivar = montoPagado;
		}

		printPayments();
		
		alert('Pago registrado con éxito: ' +  monedaPago + ' ' + formatoNumero(montoPagado));
		
		accumulatedPayment += dosDecimales(montoPagadoDolar);
		acumuladoPagadoEuros += dosDecimales(montoPagadoEuro);
		acumuladoPagadoBolivares += dosDecimales(montoPagadoBolivar);

		actualizarTotales();
		inicializarCampos();
	}
	    
// Funciones Jquery

    $(document).ready(function() 
    {
		$('.entero').numeric();
		
		$(".alternative-decimal-separator").numeric({ altDecimal: "," });
		
        $("#mostrar-registros").click(showDatabase);
        
        $("#mostrar-pagos").click(showPayments);

        $('#family-search').autocomplete(
        {
            source:'<?php echo Router::url(array("controller" => "Parentsandguardians", "action" => "findFamily")); ?>',
            minLength: 3,
            select: function( event, ui ) {
                log("<tr id=fa" + ui.item.id + " class='family'><td>" + ui.item.value + "</td></tr>");
              }
        });

        $('#busqueda-apellido-representante').autocomplete(
        {
            source:'<?php echo Router::url(array("controller" => "Parentsandguardians", "action" => "busquedaApellidoRepresentante")); ?>',
            minLength: 3,
            select: function( event, ui ) {
                log("<tr id=fa" + ui.item.id + " class='family'><td>" + ui.item.value + "</td></tr>");
              }
        });

        $('#busqueda-apellido-alumno').autocomplete(
        {
            source:'<?php echo Router::url(array("controller" => "Parentsandguardians", "action" => "busquedaApellidoAlumno")); ?>',
            minLength: 3,
            select: function( event, ui ) {
                log("<tr id=fa" + ui.item.id + " class='family'><td>" + ui.item.value + "</td></tr>");
              }
        });

        $('#newfamily').click(function(e) 
        {
            e.preventDefault();
            
            if (totalBalance > 0)
            {    
                var r = confirm("Si selecciona otro representante, perderá los datos del cobro realizado a: " + nameFamily );
                if (r == false)
                {
                    return false;
                }
            }

            cleanPager();
            
            $("#response-container").html("");
            
            disableButtons();
            
            // Mostramos texto de que la solicitud está en curso
            $("#header-messages").html("Por favor espere...");
            
            listFamilies(1);
        });

        $('#everyfamily').click(function(e) 
        {
            e.preventDefault();
            
            if (totalBalance > 0)
            {    
                var r = confirm("Si selecciona otro representante, perderá los datos del cobro realizado a: " + nameFamily );
                if (r == false)
                {
                    return false;
                }
            }

            cleanPager();
            
            $("#response-container").html("");
            
            disableButtons();
            
            // Mostramos texto de que la solicitud está en curso
            $("#header-messages").html("Por favor espere...");
            
            listFamilies(0);
        });

        $("#response-container").on("click", ".family", function()
        {
            if (totalBalance > 0)
            {    
                var r = confirm("Si selecciona otro representante, perderá los datos de pago de: " + nameFamily );
                if (r == false)
                {
                    return false;
                }
            }
            
            idFamily = $(this).attr('id').substring(2);
            
            if (selectFamily > -1)
            {
                $('#fa' + selectFamily).css('background-color', 'white');
            }
            selectFamily = idFamily;
            $('#fa' + selectFamily).css('background-color', '#c2c2d6');  
    
            cleanPager();
            
            disableButtons();
                
            $("#header-messages").html("Por favor espere...");
			
			if ($('#type-invoice').val() == 'Factura inscripción regulares' || $('#type-invoice').val() == 'Recibo inscripción regulares')
			{
				typeStudent = 0;
			}
			else if ($('#type-invoice').val() == 'Factura inscripción nuevos' || $('#type-invoice').val() == 'Recibo inscripción nuevos')
			{
				typeStudent = 1;
			}
			else
			{
				typeStudent = 2;
			}
						
			$.post('<?php echo Router::url(["controller" => "Students", "action" => "relatedStudents"]); ?>', {"id" : idFamily, "new" : typeStudent, "tasaTemporalDolar" : $("#tasa-temporal-dolar").val(), "tasaTemporalEuro" : $("#tasa-temporal-euro").val() }, null, "json")				
                     
            .done(function(response) 
            {
                if (response.success) 
                {			
					$("#header-messages").html("");
					
					nameFamily = response.data.first_name + ' ' + response.data.surname;

                    nameRepresentative = response.data.first_name + ' ' + response.data.surname;

                    students = " ";

                    idParentsandguardians = response.data.parentsandguardian_id;
                    
                    $("#date-and-time").val(response.data.today);
                    
                    reversedDate = response.data.reversedDate;

                    client = response.data.client; 

                    typeOfIdentificationClient = response.data.type_of_identification_client;

                    identificationNumberClient = response.data.identification_number_client;
    
                    fiscalAddress = response.data.fiscal_address;
                        
                    taxPhone = response.data.tax_phone;
                        
                    customerEmail = response.data.email;
														
					dollarExchangeRate = response.data.dollar_exchange_rate;
					euro = response.data.euro;
										
					// cadenaTasaDolarEuro = (euro / dollarExchangeRate).toFixed(5);
					// tasaDolarEuro = parseFloat(cadenaTasaDolarEuro);

					tasaDolarEuro = euro;
					
					saldoRepresentante = response.data.balance;
					saldoRepresentanteSigno = dosDecimales(saldoRepresentante * -1);
					
					saldoRepresentanteEuros = dosDecimales(saldoRepresentante * tasaDolarEuro); 
					saldoRepresentanteSignoEuros = dosDecimales(saldoRepresentanteSigno * tasaDolarEuro);

					saldoRepresentanteBolivares = dosDecimales(saldoRepresentante * dollarExchangeRate); 
					saldoRepresentanteSignoBolivares = dosDecimales(saldoRepresentanteSigno * dollarExchangeRate);
					
					mesesTarifas = response.data.meses_tarifas;
					otrasTarifas = response.data.otras_tarifas;
																		                        
                    $('#client').val(client);
                    $('#type-of-identification-client').val(typeOfIdentificationClient);
                    $('#identification-number-client').val(identificationNumberClient);
                    $('#fiscal-address').val(fiscalAddress);
                    $('#tax-phone').val(taxPhone);
                    $('#email').val(customerEmail);

					contadorBecaEmpleado = 0;

                    $.each(response.data.students, function(key, value) 
                    {
						julioExonerado = 0;
						morosoAnoAnterior = 0;
						
                        students += "<tr id=st" + value.id + " class='students'>";
                        idStudent = value.id;
						
						students += "<td>" + value.surname + " ";
						surname = value.surname;
						
						students += value.second_surname + "</td>";
						secondSurname = value.second_surname;

						students += "<td>" + value.first_name + " ";
						firstName = value.first_name;

						students += value.second_name + "</td>";
						secondName = value.second_name;
						
						if ($('#type-invoice').val() == 'Mensualidades')
						{ 
							students += "<td>" + value.sublevel + "</td>";
							grade = value.sublevel;

							students += "<td>" + value.section + "</td>";
							section = value.section;
						}
						else
						{
							students += "<td>" + value.level_of_study + "</td>";
							grade = value.level_of_study;

							students += "<td>No asignado</td>";
							section = "No asignado";
						}
					
						becadoAnoAnterior = value.becado_ano_anterior;
						
						if (value.scholarship == 0)
						{
							students += "<td>Regular</td></tr>";
							scholarship = 0;
						}
						else
						{
							students += "<td>Becado</td></tr>";
							scholarship = 1;
							julioExonerado = 1;
						}
						
						schoolYearFrom = value.schoolYearFrom;
																		
						julioAnoAnterior = "Jul " + anoEscolarInscripcion;
						
						tipoDescuento = value.tipo_descuento;

						if (value.descuento_ano_anterior == 0)
						{
							descuentoAnoAnterior = 1;
						}
						else
						{	
							descuentoAnoAnterior = (100 - value.descuento_ano_anterior) / 100;
						}
						
						if (value.discount_family === null)
						{
							discountFamily = 1;
						}
						else
						{	
							discountFamily = (100 - value.discount_family) / 100;
						}

						indiceEncontrado = value.indice_encontrado;
						nivelBuscado = value.nivel_buscado;
						nivelEstudioActual = value.nivel_estudio_actual;
						nivelEstudioPasado = value.nivel_estudio_pasado;
						nivelEstudioAntepasado = value.nivel_estudio_antepasado;
						
                        $.each(value.studentTransactions, function(key2, value2) 
                        {
							indicadorImpresion = 0;
							
							transactionIdentifier = value2.id;
							
							paymentDate = value2.payment_date;
							
							anoMes = paymentDate.substring(0, 4) + paymentDate.substring(5, 7);

							transactionType = value2.transaction_type;
							
							anoEscolarMensualidad = value2.ano_escolar;

							monthlyPayment = value2.transaction_description;
						
							amountMonthly = 0;
							tarifaDolar = 0;
							
							if (transactionType == "Mensualidad")
							{
								diferenciaAnos = anoEscolarInscripcion - anoEscolarMensualidad;

								if (diferenciaAnos == 0)
								{
									nivelEstudioAplicar = nivelEstudioActual;
								}
								else if (diferenciaAnos == 1)
								{
									nivelEstudioAplicar = nivelEstudioPasado;
								}
								else
								{
									nivelEstudioAplicar = nivelEstudioAntepasado;
								}

								nivelTarifa = 'Mensualidad' + nivelEstudioAplicar + anoMes;

								$.each(mesesTarifas, function(key3, value3)											
								{
									if (nivelTarifa == value3.anoMes)
									{
										amountMonthly = value3.tarifaBolivar;
										tarifaDolar = value3.tarifaDolar;
										return false;
									}
								});
							}
							else
							{
								nivelTarifa = transactionType + ' ' + nivelEstudioActual + ' ' + anoEscolarMensualidad;

								$.each(otrasTarifas, function(key3, value3)											
								{
									if (nivelTarifa == value3.conceptoAno)
									{
										amountMonthly = value3.tarifaBolivar;
										tarifaDolar = value3.tarifaDolar;
										return false;
									}
								});
								
								if (tipoDescuento == "Empleado")
								{
									contadorBecaEmpleado++;
								}

								if (contadorBecaEmpleado > 1)
								{
									indicadorImpresion = 1;
								}

								console.log('transactionType ' + transactionType + ' tipoDescuento ' + tipoDescuento + ' contadorBecaEmpleado ' + contadorBecaEmpleado + ' indicadorImpresion ' + indicadorImpresion);

							}

							transactionAmount = dosDecimales(value2.amount);
							
							amountPaid = dosDecimales(value2.amount);
						
							originalAmount = dosDecimales(value2.original_amount);
							
							diferenciaOriginalActual = dosDecimales(originalAmount - amountPaid);
							
							tarifaDolar = dosDecimales(tarifaDolar - diferenciaOriginalActual);
							
							invoiced = value2.invoiced;

							partialPayment = value2.partial_payment;
							
							paidOut = value2.paid_out;
							
							studentName = surname + ' ' + secondSurname + ' ' + firstName + ' ' + secondName;

							montoDolar = dosDecimales(value2.amount_dollar);

							if (value2.porcentaje_descuento == 0)
							{
								porcentajeDescuento = 1;
							}
							else
							{	
								porcentajeDescuento = dosDecimales((100 - value2.porcentaje_descuento) / 100);
							}

							if (paidOut == true)
							{
								/*
								if (montoDolar === null)
								{*/
									montoDolar = 0;
									montoPendienteDolar = 0;
									montoAPagarDolar = 0;
									montoAPagarEuro = 0;
									montoAPagarBolivar = 0;
									indicadorImpresion = 1;
								/*}
								else
								{						
									if (transactionType == "Mensualidad")
									{
										tarifaDolarSinDescuento = tarifaDolar;
										
										tarifaDolar = dosDecimales(tarifaDolar * porcentajeDescuento);
										
										if (tarifaDolar == tarifaDolarSinDescuento)
										{										
											if (tarifaDolar != montoDolar)
											{
												montoPendienteDolar = dosDecimales(tarifaDolar - montoDolar);
												montoAPagarDolar = montoPendienteDolar;
												montoAPagarEuro = dosDecimales(montoAPagarDolar * tasaDolarEuro);
												montoAPagarBolivar = dosDecimales(montoAPagarDolar * dollarExchangeRate);	
												paidOut = false;
												
												if (monthlyPayment == julioAnoAnterior && julioExonerado == 0 && montoDolar < tarifaDolar)
												{
													morosoAnoAnterior = 1;
												}
											}
											else
											{
												montoDolar = 0;
												montoPendienteDolar = 0;
												montoAPagarDolar = 0;
												montoAPagarEuro = 0;
												montoAPagarBolivar = 0
												indicadorImpresion = 1;
											}
										}
										else
										{											
											if (tarifaDolar != montoDolar && tarifaDolarSinDescuento != montoDolar)
											{
												montoPendienteDolar = dosDecimales(tarifaDolar - montoDolar);
												montoAPagarDolar = montoPendienteDolar;
												montoAPagarEuro = dosDecimales(montoAPagarDolar * tasaDolarEuro);
												montoAPagarBolivar = dosDecimales(montoAPagarDolar * dollarExchangeRate);	
												paidOut = false;
												
												if (monthlyPayment == julioAnoAnterior && julioExonerado == 0 && montoDolar < tarifaDolar)
												{
													morosoAnoAnterior = 1;
												}
											}
											else
											{
												montoDolar = 0;
												montoPendienteDolar = 0;
												montoAPagarDolar = 0;
												montoAPagarEuro = 0;
												montoAPagarBolivar = 0
												indicadorImpresion = 1;
											}
										}
									}
									else
									{
										if (tarifaDolar != montoDolar)
										{												
											montoPendienteDolar = dosDecimales(tarifaDolar - montoDolar);
											montoAPagarDolar = montoPendienteDolar;
											montoAPagarEuro = dosDecimales(montoAPagarDolar * tasaDolarEuro);
											montoAPagarBolivar = dosDecimales(montoAPagarDolar * dollarExchangeRate);
											paidOut = false;
										}
										else
										{
											montoDolar = 0;
											montoPendienteDolar = 0;
											montoAPagarDolar = 0;
											montoAPagarEuro = 0;
											montoAPagarBolivar = 0
											indicadorImpresion = 1;
										}									
									}
								}*/
							}
							else if (transactionType != 'Mensualidad')
							{
								montoPendienteDolar = dosDecimales(tarifaDolar - montoDolar);
								montoAPagarDolar = montoPendienteDolar;
								montoAPagarEuro = dosDecimales(montoAPagarDolar * tasaDolarEuro);
								montoAPagarBolivar = dosDecimales(montoAPagarDolar * dollarExchangeRate);	
							}
							else
							{								
								if (anoEscolarMensualidad == anoEscolarActual)
								{
									tarifaDolar = dosDecimales(tarifaDolar * discountFamily);
								}
								else
								{
									tarifaDolar = dosDecimales(tarifaDolar * descuentoAnoAnterior);
								}
								
								montoPendienteDolar = dosDecimales(tarifaDolar - montoDolar);
								montoAPagarDolar = montoPendienteDolar;
								montoAPagarEuro = dosDecimales(montoAPagarDolar * tasaDolarEuro);
								montoAPagarBolivar = dosDecimales(montoAPagarDolar * dollarExchangeRate);
								if (monthlyPayment == julioAnoAnterior && julioExonerado == 0)
								{
									morosoAnoAnterior = 1;
								}
							}
							
							if ($('#type-invoice').val() == 'Factura inscripción regulares')
							{
								if (indicadorImpresion == 0)
								{
									if (monthlyPayment.substring(0, 9) == "Matrícula" ||
										monthlyPayment.substring(0, 14) == "Seguro escolar")
									{
										insertRecord();
									}
								}								
							}
							else if ($('#type-invoice').val() == 'Factura inscripción nuevos')
							{
								if (monthlyPayment.substring(0, 9) == "Matrícula")
									{
										if (indicadorImpresion == 0)
										{
											insertRecord();
										}
									}								
							}
							else if ($('#type-invoice').val() == 'Recibo inscripción regulares')
							{
								if (indicadorImpresion == 0)
								{
									if (monthlyPayment.substring(0, 9) == "Matrícula" ||
										monthlyPayment.substring(0, 14) == "Seguro escolar")
									{
										insertRecord();
									}
								}
							}
							else if ($('#type-invoice').val() == 'Recibo inscripción nuevos')
							{
								if (monthlyPayment.substring(0, 9) == "Matrícula")
									{
										if (indicadorImpresion == 0)
										{
											insertRecord();
										}
									}
							}
							else
							{
								if (indicadorImpresion == 0)
								{
									if (tipoDescuento == 'Hijos' && discountFamily != 1)
									{
										if (monthlyPayment.substring(0, 9) != "Matrícula")
										{
											insertRecord();
										}
									}
									else
									{
										insertRecord();
									}
								}
							}
						});				
					});	
                    $("#header-messages").html(" ");
                    $("#related-students").html(students);
                } 
                else 
                {
                    $("#header-messages").html('No se pudieron obtener los datos de los alumnos: ' + response.message);
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) 
            {
                $("#header-messages").html("Algo ha fallado en el servidor: " + textStatus);
            });  
        });

        $('#update-data').click(function(e) 
        {
			var resultado = 0;
			
            e.preventDefault();
		
			resultado = validarDatosFiscales();
			
			if (resultado > 0)
			{
				alert("Estimado usuario uno o más datos fiscales presentan errores. Por favor revise");
				window.scrollTo(0, 0);
				return false;
			}
			else
			{
				$("#header-messages").html("Por favor espere...");

				$.post('<?php echo Router::url(["controller" => "Parentsandguardians", "action" => "updateClientData"]); ?>', 
					{"id" : idParentsandguardians, 
					"client" : $('#client').val(),
					"typeOfIdentificationClient" : $('#type-of-identification-client').val(),
					"identificationNumberClient" : $('#identification-number-client').val(),
					"fiscalAddress" : $('#fiscal-address').val(),
					"taxPhone" : $('#tax-phone').val()}, null, "json")          

				.done(function(response) 
				{
					if (response.success) 
					{
						$("#header-messages").html("Los datos fiscales fueron actualizados correctamente...");
					} 
					else 
					{
						$("#header-messages").html("Los datos fiscales no pudieron ser actualizados, intente nuevamente");
					}
				})
				.fail(function(jqXHR, textStatus, errorThrown) 
				{
					$("#header-messages").html("Algo ha fallado, los datos fiscales no pudieron ser actualizados: " + textStatus);
				});  
			}
        });

        $("#related-students").on("click", ".students", function(e)
        {
			e.preventDefault();

			resultado = validarDatosFiscales();
			
			if (resultado > 0)
			{
				alert("Estimado usuario uno o más datos fiscales presentan errores. Por favor revise");
				window.scrollTo(0, 0);
				return false;
			}
			else
			{
				$("#student-messages").html("Por favor espere...");
	
				idStudent = $(this).attr('id').substring(2);
	
				if (selectedStudent > -1)
				{
					uncheckStudent(selectedStudent);
				}
				selectedStudent = idStudent;
				markStudent(selectedStudent); 
				$("#monthly-payment").html("");
				$("#student-name").html("");
				$("#student-concept").text(" ");
				studentBalance = 0;
				$("#student-balance").html("");
				
				showRecords();
				
				$("#student-messages").html("");
			}
        });
        
        $("#mark-quotas").click(function () 
        {
            var firstInstallment = " ";
            var lastInstallment = " ";
            var flaggedFlag = 0;
			var blocked_amount = 0;
			inputCounter = 0;		            
            $("#monthly-payment input").each(function (index) 
            {
				if (inputCounter == 0)
				{
					if($(this).attr('value') != "Pagada")
					{
						if(!($(this).is(':checked'))) 
						{
							if (flaggedFlag == 0)
							{
								flaggedFlag = 1;
								$(this).attr('checked', true);
								idStudentTransactions = $(this).attr('id'); 
								markTransaction(idStudentTransactions.substring(2));
								updateRecord(idStudentTransactions.substring(2), 'true'); 
								$('#uncheck-quotas').attr('disabled', false);
								$('#charge').attr('disabled', false);
								if (firstInstallment == " ")
								{
									firstInstallment = $(this).attr('name');
								}
								lastInstallment = $(this).attr('name');
								$("#student-concept").text('(' + firstInstallment + ' - ' + lastInstallment + ')');
								concept = firstInstallment + ' - ' + lastInstallment;
								studentBalance = dosDecimales(studentBalance + parseFloat($(this).attr('value')));
								totalBalance = dosDecimales(totalBalance + parseFloat($(this).attr('value')));
								contadorCuotasSeleccionadas++;
								actualizarTotales();
							}
							else
							{
								$("#mark-quotas").html($(this).attr('name'));
								return false;
							}
						}
						else
						{
							if (firstInstallment == " ")
							{
								firstInstallment = $(this).attr('name');
							}
						}
					}
					inputCounter++;
				}
				else if (inputCounter == 1)
				{
					if (flaggedFlag == 1 && blocked_amount == 0)
					{
						$(this).attr('disabled', true);
						blocked_amount = 1;	
						inputCounter++;
					}
					else
					{
						inputCounter++;
					}
				}
				else if (inputCounter == 3)
				{
					inputCounter = 0;
				}
				else
				{
					inputCounter++;
				}
            }); 
        });

        $("#uncheck-quotas").click(function () 
        {
            var transactionDescription = "";
            var firstInstallment = " ";
            var lastInstallment = " ";
            var markedQuotaCounter = 0;
            var indicatorUnmark = 0;
            idStudentTransactions = " ";
			idAmountTransactions = "";
            transactionDescription = " ";
			inputCounter = 0;

            $("#monthly-payment input").each(function (index) 
            {
				if (inputCounter == 0)
				{				
					if($(this).attr('value') != "Pagada")
					{
						if($(this).is(':checked'))
						{
							if (firstInstallment == " ")
							{
								firstInstallment = $(this).attr('name');
							}
							if (lastInstallment == " ")
							{
								lastInstallment = $(this).attr('name');
							}
							else
							{
								lastInstallment = transactionDescription;
							}
							markedQuotaCounter++;
					
							idStudentTransactions = $(this).attr('id');
							transactionDescription = $(this).attr('name');
							transactionAmount = parseFloat($(this).attr('value'));
						}
						else 
						{
							if (idStudentTransactions != " ")
							{
								if (indicatorUnmark == 0)
								{
									indicatorUnmark = 1;
								}
								$('#' + idStudentTransactions).attr('checked', false);
								$('#' + idAmountTransactions).attr('disabled', false);								
								uncheckTransaction(idStudentTransactions.substring(2));
								updateRecord(idStudentTransactions.substring(2), 'false'); 
								$("#mark-quotas").html(transactionDescription);
								if (markedQuotaCounter == 1)
								{
									firstInstallment = " ";
									lastInstallment = " ";
									$("#student-concept").text(" ");
								}
								else
								{
									$("#student-concept").text('(' + firstInstallment + ' - ' + lastInstallment + ')');
									concept = firstInstallment + ' - ' + lastInstallment;
								}
								studentBalance = dosDecimales(studentBalance - transactionAmount);															
								totalBalance = dosDecimales(totalBalance - transactionAmount);
								contadorCuotasSeleccionadas--;
								actualizarTotales();
								return false;
							}
						}
					}
					inputCounter++;
				}
				else if (inputCounter == 1)
				{
					idAmountTransactions = $(this).attr('id');
					inputCounter++;
				}
				else if (inputCounter == 3)
				{
					inputCounter = 0;
				}
				else
				{
					inputCounter++;
				}
            });
            if (idStudentTransactions == " ")
            {
                alert("Debe cobrar al menos una cuota para poder reversar");
            }
            else 
            {
                if (indicatorUnmark == 0)
                {
                    $('#' + idStudentTransactions).attr('checked', false);
                    uncheckTransaction(idStudentTransactions.substring(2));
                    updateRecord(idStudentTransactions.substring(2), 'false'); 
                            
                    $("#mark-quotas").html(transactionDescription);
                    if (markedQuotaCounter == 1)
                    {
                        firstInstallment = " ";
                        lastInstallment = " ";
                        $("#student-concept").text(" ");
                    }
                    else
                    {
                        $("#student-concept").text('(' + firstInstallment + ' - ' + lastInstallment + '):');
                        concept = firstInstallment + ' - ' + lastInstallment;
                    }					
					studentBalance = dosDecimales(studentBalance - transactionAmount);															
					totalBalance = dosDecimales(totalBalance - transactionAmount);
					contadorCuotasSeleccionadas--;
					actualizarTotales();
                }
            }
        }); 
        
        $("#ajuste-automatico").click(function(e) 
        {
            e.preventDefault();
			
			if (contadorCuotasSeleccionadas == 0)
			{
				alert("Estimado usuario debe seleccionar al menos una cuota antes de hacer un ajuste");
				return-false				
			}
							
			if (deudaMenosPagado == 0)
			{
				alert("Estimado usuario la factura ya está cuadrada y no requiere un ajuste");
				return-false
			}
			        
			ajustarCuotas();
        });

        $("#accordion").accordion();

        $('.record-payment').click(function(e) 
        {
            e.preventDefault();
            		
            if (deudaMenosPagado > 0)
            {
                paymentIdentifier = ($(this).attr('id')).substring(3);
                
                valid = validateFields();
                
                if (valid == false)
                {
                    return false;
                }

                switch (paymentIdentifier) 
                {
                    case '01':
                    paymentType = "Efectivo";
                    break;
                    case '02':
                    paymentType = "Tarjeta de débito";
                    break;
                    case '03':
                    paymentType = "Tarjeta de crédito";
                    break;
                    case '04':
                    paymentType = "Depósito";
                    break;
                    case '05':
                    paymentType = "Transferencia";
                    break;
                    case '06':
                    paymentType = "Cheque";
                    break;
                    case '07':
                    paymentType = "Retención de impuesto";
                }
				
				montoPagado = dosDecimales(eliminarComa($('#amount-' + paymentIdentifier).val()));
				bank = $('#bank-' + paymentIdentifier).val();
				bancoReceptor = $('#banco-receptor-' + paymentIdentifier).val();
                accountOrCard = $('#account_or_card-' + paymentIdentifier).val();
                serial = $('#serial-' + paymentIdentifier).val();
				comentario = $('#comentario-' + paymentIdentifier).val();
				
				if (bank == 'Zelle' && monedaPago != '$')
				{
					alert('Estimado usuario los pagos desde Zelle deben ser en dólares');
					return false;
				}
				else if (bancoReceptor == 'Zelle' && monedaPago != '$')
				{
					alert('Estimado usuario los pagos hacia Zelle deben ser en dólares');
					return false;
				}
				if (bank == 'Euros' && monedaPago != 'P')
				{
					alert('Estimado usuario los pagos desde COP deben ser en COP');
					return false;
				}
				else if (bancoReceptor == 'Euros' && monedaPago != 'P')
				{
					alert('Estimado usuario los pagos hacia COP deben ser en COP');
					return false;
				}
				else if (bank != 'Zelle' && bank != "Euros" && bank != "N/A" && monedaPago != 'Bs.')
				{
					alert('Estimado usuario los pagos desde bancos nacionales deben ser en bolívares');
					return false;
				}
				else if (bancoReceptor != 'Zelle' && bancoReceptor != "Euros" && bancoReceptor != "N/A" && monedaPago != 'Bs.')
				{
					alert('Estimado usuario los pagos hacia bancos nacionales deben ser en bolívares');
					return false;
				}
				
				if (bank == 'Zelle' && paymentType != 'Transferencia')
				{
					alert('Estimado usuario los pagos desde Zelle solo deben ser en transferencia');
					return false;
				}
				else if (bancoReceptor == 'Zelle' && paymentType != 'Transferencia')
				{
					alert('Estimado usuario los pagos desde Zelle solo deben ser en transferencia');
					return false;
				}	

				if (paymentType == 'Transferencia' || paymentType == 'Deposito')
				{
					if (bank != 'Zelle' && bank != 'Euros' && bank != 'Comprobante')
					{					
						crm_processing_modal('Por favor espere mientras se valida el serial');
	
						$.post('<?php echo Router::url(["controller" => "Payments", "action" => "verificarSerial"]); ?>', 
							{
								"banco" : bank, 
								"serial" : serial
							}, null, "json")          

						.done(function(response) 
						{
							if (response.success) 
							{
								crm_processing_modal_close(); 
								procesarPago();
							} 
							else 
							{
								crm_processing_modal_close(); 
								alert(response.message);
							}
						})
						.fail(function(jqXHR, textStatus, errorThrown) 
						{
							crm_processing_modal_close(); 
							alert ("El serial no pudo ser validado. Código de error " + textStatus);
						});  
					}
					else
					{
						procesarPago();
					}
				}
				else
				{
					procesarPago();
				}
            }
            else
            {
                alert('No se pueden registrar más pagos, porque la factura ya fue pagada totalmente');
            }
        });

        $("#registered-payments").on("click", ".registeredPayments", function(e)
        {
			e.preventDefault();
			
            selectedPayment = ($(this).attr('id').substring(1));
            paymentType = $(this).attr('name');
            montoPagado = parseFloat($(this).attr('value'));
            var r = confirm("Está seguro de que desea eliminar este pago");
            if (r == false)
            {
                return false;
            }
            $("#pa" + selectedPayment).remove();
            
			buscarMoneda(parseFloat(selectedPayment));
			
            deletePayment(parseFloat(selectedPayment));
			
        });
		
        $("#print-invoice").click(function (e) 
        {	
            e.preventDefault();

			if (contadorCuotasSeleccionadas == 0)
			{
				alert('Estimado usuario debe seleccionar al menos una cuota para poder facturar');
				return false;				
			}
			else if (deudaMenosPagado > 0)
			{
				alert('Estimado usuario debe registrar más pagos para completar el total de la factura/recibo u hacer un ajuste');
				return false;
			}
            else if (deudaMenosPagado < 0)
            {
				if (saldoRepresentante < balanceDescuento)
				{
					var dialog = $('<p>Estimado usuario hay un sobrante a favor del representante. ¿Qué desea hacer?</p>').dialog(
					{
						buttons: 
						{
							"Abonar a cuotas": function() 
							{
								dialog.dialog('close');
							},
							"Dejarlo a favor":  function() 
							{
								imprimirReciboSobrante = 1;
								guardarFactura();
							},
							"Cancelar":  function() 
							{
								dialog.dialog('close');
							}
						}
					});
				}
				else
				{
					r= confirm('¿Está seguro de que desea guardar la facturar? Después no podrá hacer cambios');
					if (r == false)
					{
						return false;
					}
					else
					{
						guardarFactura();
					}
				}
            }   
			else
			{
				r= confirm('¿Está seguro de que desea guardar la facturar? Después no podrá hacer cambios');
				if (r == false)
				{
					return false;
				}
				else
				{
					guardarFactura();
				}
			}
        });
		
        $('#descuento-recargo').change(function(e) 
        {
			e.preventDefault();
			actualizarDescuentos();
        });
		
		$('#cantidad-descuento').change(function(e) 
        { 
			e.preventDefault();
			actualizarDescuentos();					

        });
				
        $('#update-dollar').click(function(e) 
        {
            e.preventDefault();
			
			if (totalBalance > 0)
			{    
				var r = confirm("Si actualiza la tasa de cambio, perderá los datos de la cobranza a: " + nameFamily );
				if (r == false)
				{
					return false;
				}
			}

			$('#quota-adjustment').val("");
			cleanPager();
			$("#response-container").html("");
			disableButtons();
		
            $.post('<?php echo Router::url(["controller" => "Monedas", "action" => "actualizarTasa"]); ?>', 
                {"amount" : $('#dollar-exchange-rate').val(), "tipo" : "Dolar" }, null, "json")          

            .done(function(response) 
            {
                if (response.success) 
                {
                    $("#dollar-messages").html("La tasa de cambio fue actualizada correctamente");
                } 
                else 
                {
                    $("#dollar-messages").html("La tasa de cambio no pudo ser actualizada");
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) 
            {
                $("#dollar-messages").html("Algo ha fallado, la tasa de cambio no pudo ser actualizada: " + textStatus);
            });  
        });
		
        $('#update-euro').click(function(e) 
        {
            e.preventDefault();
			
			if (totalBalance > 0)
			{    
				var r = confirm("Si actualiza la tasa de cambio, perderá los datos de la cobranza a: " + nameFamily );
				if (r == false)
				{
					return false;
				}
			}

			$('#quota-adjustment').val("");
			cleanPager();
			$("#response-container").html("");
			disableButtons();
		
            $.post('<?php echo Router::url(["controller" => "Monedas", "action" => "actualizarTasa"]); ?>', 
                {"amount" : $('#euro').val(), "tipo" : "Euro" }, null, "json")          

            .done(function(response) 
            {
                if (response.success) 
                {
                    $("#euro-messages").html("La tasa de cambio fue actualizada correctamente");
                } 
                else 
                {
                    $("#euro-messages").html("La tasa de cambio no pudo ser actualizada");
                }
            })
            .fail(function(jqXHR, textStatus, errorThrown) 
            {
                $("#euro-messages").html("Algo ha fallado, la tasa de cambio no pudo ser actualizada: " + textStatus);
            });  
        });		
		
        $('#establecer-tasa-dolar').click(function(e) 
        {
			e.preventDefault();
																			
			if ($("#tasa-temporal-dolar").val() > 0)
			{
				if (totalBalance > 0)
				{    
					var r = confirm("Si establece una tasa temporal, perderá los datos de la cobranza a: " + nameFamily );
					if (r == false)
					{
						return false;
					}
				}

				$('#quota-adjustment').val("");
				cleanPager();
				$("#response-container").html("");
				disableButtons();  
				$('#tasa-temporal-dolar').css('background-color', '#ffb3b3');
				$("#establecer-tasa-dolar").addClass("noverScreen");
				$("#eliminar-tasa-dolar").removeClass("noverScreen");
				tasaTemporalDolar = 1;
				alert("Estimado usuario, por favor recuerde establecer también la tasa temporal del Euro");
				$( "#tasa-temporal-euro" ).focus();
			}
			else
			{
				alert("La tasa temporal debe ser mayor a cero");		
			}
        });
		
        $('#eliminar-tasa-dolar').click(function(e) 
        {
			e.preventDefault();
			if (totalBalance > 0)
			{    
				var r = confirm("Si elimina una tasa temporal, perderá los datos de la cobranza a: " + nameFamily );
				if (r == false)
				{
					return false;
				}
			}

			$('#quota-adjustment').val("");
			cleanPager();
			$("#response-container").html("");
			disableButtons();  
			$('#tasa-temporal-dolar').val('0,00');			
			$('#tasa-temporal-dolar').css('background-color', 'white');
			$("#establecer-tasa-dolar").removeClass("noverScreen");
			$("#eliminar-tasa-dolar").addClass("noverScreen");
			tasaTemporalDolar = 0;
			alert("Estimado usuario, por favor recuerde eliminar también la tasa temporal del COP");
			$( "#tasa-temporal-euro" ).focus();
        });
		
        $('#establecer-tasa-euro').click(function(e) 
        {
			e.preventDefault();
			if ($("#tasa-temporal-euro").val() > 0)
			{
				if (totalBalance > 0)
				{    
					var r = confirm("Si establece una tasa temporal, perderá los datos de la cobranza a: " + nameFamily );
					if (r == false)
					{
						return false;
					}
				}

				$('#quota-adjustment').val("");
				cleanPager();
				$("#response-container").html("");
				disableButtons();  
				$('#tasa-temporal-euro').css('background-color', '#ffb3b3');
				$("#establecer-tasa-euro").addClass("noverScreen");
				$("#eliminar-tasa-euro").removeClass("noverScreen");
				tasaTemporalEuro = 1;
			}
			else
			{
				alert("La tasa temporal debe ser mayor a cero");		
			}
        });
		
        $('#eliminar-tasa-euro').click(function(e) 
        {
			e.preventDefault();
			if (totalBalance > 0)
			{    
				var r = confirm("Si elimina una tasa temporal, perderá los datos de la cobranza a: " + nameFamily );
				if (r == false)
				{
					return false;
				}
			}

			$('#quota-adjustment').val("");
			cleanPager();
			$("#response-container").html("");
			disableButtons();  
			$('#tasa-temporal-euro').val('0,00');			
			$('#tasa-temporal-euro').css('background-color', 'white');
			$("#establecer-tasa-euro").removeClass("noverScreen");
			$("#eliminar-tasa-euro").addClass("noverScreen");
			tasaTemporalEuro = 0;
        });
		
        $('#adjust-fee').click(function(e) 
        {
            e.preventDefault();
			
			var adjInputCounter = 0;
			var adjIdAmountTransaction = ""; 
			var adjMontoModificadoDolar = 0;
			var adjOriginalMontoDolar = 0;
			var adjMontoPagadoDolar = 0;
			var adjMontoPendienteDolar = 0;
			var adjAPagarDolar = 0;
			var adjAPagarEuro = 0;
			var adjAPagarBolivar = 0;
			var montoDolarCadena;
			var adjError = 0;
			var indicadorChequeado = 0;
						
            $("#monthly-payment input").each(function (index) 
            {
				if (adjInputCounter == 1)
				{
					adjMontoModificadoDolar = parseFloat($(this).val().replace(',', '.')).toFixed(2);

					adjIdAmountTransaction = $(this).attr('id');
					adjInputCounter++;
				}
				else if (adjInputCounter == 2)
				{
					adjMontoPagadoDolar = parseFloat($(this).val().replace(',', '.')).toFixed(2);;
					adjInputCounter++;					
				}
				else if (adjInputCounter == 3)
				{
					adjOriginalMontoDolar = parseFloat($(this).val().replace(',', '.')).toFixed(2);;
					if (adjMontoModificadoDolar != adjOriginalMontoDolar)
					{					
						if (adjMontoModificadoDolar > adjMontoPagadoDolar)
						{
							adjMontoPendienteDolar = dosDecimales(adjMontoModificadoDolar - adjMontoPagadoDolar);				
							var adjAPagarDolar = adjMontoPendienteDolar;
							var adjAPagarEuro = dosDecimales(adjAPagarDolar * tasaDolarEuro);
							var adjAPagarBolivar = dosDecimales(adjAPagarDolar * dollarExchangeRate);
							updateInstallment(adjIdAmountTransaction.substring(2), adjOriginalMontoDolar, adjMontoModificadoDolar, adjMontoPendienteDolar, adjAPagarDolar, adjAPagarEuro, adjAPagarBolivar, "");
							$('#' + adjIdAmountTransaction).css('background-color', '#ffffff');
							cambioMontoCuota = 1;
						}
						else if (adjMontoModificadoDolar == adjMontoPagadoDolar)
						{
							updateInstallment(adjIdAmountTransaction.substring(2), adjOriginalMontoDolar, adjMontoModificadoDolar, 0, 0, 0, 0, "(Exonerado)");
							$('#' + adjIdAmountTransaction).css('background-color', '#ffffff');
							cambioMontoCuota = 1;
						}
						else
						{
							alert('Error: El monto de la cuota ajustada debe ser mayor al monto abonado');
							$('#' + adjIdAmountTransaction).css('background-color', '#ff5050');
							adjError = 1;
							return false;
						}
					}
					
					adjInputCounter = 0;
					adjModifiableFee = 0;
					adjOriginalAmount = 0;
					adjAmountPaid = 0;
					adjAmountPayable = 0;
					adjIdAmountTransaction = '';
				}
				else
				{
					adjInputCounter++;
				}
            });
			if (adjError == 0)
			{
				showRecords();
			}
        });
		
        $('#compensar').click(function(e) 
        {
			e.preventDefault();
			$("#print-invoice").attr('disabled', false);
			$("#ajuste-automatico").attr('disabled', false);
			$(".record-payment").attr('disabled', false);		
			$("#nota-credito").addClass("noverScreen");
			$("#botones-notas").addClass("noverScreen");
			$("#botones-cuotas").removeClass("noverScreen");
			indicadorCompensacion = 1;
        });
		
		$('.check-dolar').click(function(e) 
        {
			monedaPago = "$";
			$('.check-dolar').attr('checked', true);
			$('.check-dolar').prop('checked', true);
			$('.check-euro').attr('checked', false);
			$('.check-euro').prop('checked', false);
			$('.check-bolivar').attr('checked', false);
			$('.check-bolivar').prop('checked', false);
			updateAmount();
		});
		
		$('.check-euro').click(function(e) 
        {
			monedaPago = "P";
			$('.check-dolar').attr('checked', false);
			$('.check-dolar').prop('checked', false);
			$('.check-euro').attr('checked', true);
			$('.check-euro').prop('checked', true);
			$('.check-bolivar').attr('checked', false);
			$('.check-bolivar').prop('checked', false);
			aCobrarEuros();
		});
		
		$('.check-bolivar').click(function(e) 
        {
			monedaPago = "Bs.";
			$('.check-dolar').attr('checked', false);
			$('.check-dolar').prop('checked', false);
			$('.check-euro').attr('checked', false);
			$('.check-euro').prop('checked', false);
			$('.check-bolivar').attr('checked', true);
			$('.check-bolivar').prop('checked', true);
			aCobrarBolivares();
		});
		
		$('#prueba-ajuste').click(function(e) 
        {
			diferenciaBolivares = 22.5;
			uploadTransactions();
		});

		$("#imprimir-estado-cuenta").click(function(){
        
        $(".estado-cuenta").table2excel({
    
            exclude: ".noExl",
        
            name: "",
        
            filename: "estado-cuenta" 
    
        });
    });
		
    }); 

</script>