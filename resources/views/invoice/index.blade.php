<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<title>Makna Wedding & Event Planner</title>

		<!-- Invoice styling -->
		<style>
			body {
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				text-align: center;
				color: #777;
			}

			body h1 {
				font-weight: 300;
				margin-bottom: 0px;
				padding-bottom: 0px;
				color: #000;
			}

			body h3 {
				font-weight: 300;
				margin-top: 10px;
				margin-bottom: 20px;
				font-style: italic;
				color: #555;
			}

			body a {
				color: #06f;
			}

			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 14px;
				line-height: 20px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-collapse: collapse;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

            .watermark {
				position: absolute;
				top: 20%;
				left: 50%;
				transform: translate(-50%, -50%);
				font-size: 50px;
				color: rgba(240, 16, 16, 0.661);
				white-space: nowrap;
				z-index: -1;
				user-select: none;
				pointer-events: none;
			}
		</style>
	</head>

	<body>    
		<div class="watermark">
			{{$invoice->paid_date ? 'LUNAS' : 'BELUM LUNAS'}}
		</div>		
		
        <div class="invoice-box">
			<table>
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="/images/logomki.png" style="width:100%; max-width:300px;"/>
								</td>

								<td>
									Invoice No : 00{{$invoice->id}}<br/>
									Created : {{$invoice->issued_date}}<br/>
									Due Date : {{$invoice->due_date}}<br/>
									Paid Date : {{$invoice->paid_date}}<br/>
                                    Employee : Finance<br/>
									Perusahaan : {{$invoice->master->penyelenggara}}                             
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>								
							Kepada Yth Bpk/Ibu Sdr/i :<br>
								{{$invoice->client->nama_tenant}} ( {{$invoice->project->nomor_tenant}} )<br><br>
							Alamat :<br>
								{{$invoice->client->alamat_tenant}}<br><br>	
							No. Telp :
								{{$invoice->client->whatsapp}}<br>
							Email :
								{{$invoice->client->email}}<br><br>								
							</tr>
						</table>
					</td>
				</tr>
			
				<tr class="heading">
					<td>
                        No. Kuitansi : {{$invoice->notes}}
					</td>
					<td>
						Nominal
					</td>
				</tr>

				<tr class="details">
					<td>
                        Rekanan :<br/> {{$invoice->project->rekanan_tenant}}<br/>
                    </td>

					<td>
                        Rp. {{number_format($invoice->project->harga_jual)}}
                    </td>
				</tr>

				<tr class="heading">
					<td>Pembayaran</td>

					<td>Price</td>
				</tr>

				<tr class="pembayaran">
					<td>
                        {{$invoice->master->nama_event}} ({{$invoice->keterangan}})
                    </td>

					<td>
                        Rp. {{number_format($invoice->total)}}
                        <br></br>
                    </td>
				</tr>

                <tr class="heading">
					<td>Sisa Pembayaran</td>
					<td>Rp. {{number_format($invoice->project->harga_jual-$invoice->total)}}</td>
				</tr>
					<td>
                        No. Rek Pembayaran :<br/>
                        1. PT. Bank Mandiri, Tbk (112 00 7744 4474) an. CV. Rumah Desain Production<br/>
                        2. PT. Bank Mandiri, Tbk (112 00 2929 9299) an. Retri Yuselli
                    </td>
				</tr>
			</table>
		</div>
	</body>
</html>