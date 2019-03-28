update far.solicitacaoprocedimentoapac set data_validade = '17/05/2018' -- (inserir nova data validade formato dia,mes/ano apac)
where 
	id_solicitacaoprocedimentoapac in 
	( 
		select 
			sapa.id_solicitacaoprocedimentoapac
		from 
			far.solicitacaoprocedimentoapac as sapa,
			gen.paciente                    as paci,
			far.numeracaoapac               as napa
		where
			sapa.id_paciente = paci.id_paciente and
			sapa.id_solicitacaoprocedimentoapac = napa.id_solicitacaoprocedimentoapac and
			napa.nume_apac in ('5318200684687') -- (inserir numero das apacs a serem modificada a data validade 
			
	)