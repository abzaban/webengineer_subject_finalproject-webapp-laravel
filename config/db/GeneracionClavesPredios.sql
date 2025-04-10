create procedure PA_ObtenerClavePredio
	@claveGenerada varchar(4) output
as
begin
	declare @cuenta int
	begin try
	begin tran
		select @cuenta = (select cuenta from cuentaPredios with (UPDLOCK)) + 1
		set @claveGenerada = dbo.convierteNumeroAClave(@cuenta)
		commit tran
	end try
	begin catch
		rollback tran 
	end catch
end

create function [dbo].[convierteNumeroAClave](@numero int)
returns varChar(4)
as
begin
	declare @clave varChar(4)
	set @clave = @numero
	while LEN(@clave) < 3 
	begin
		set @clave = '0' + @clave
	end
	return ('P' + @clave)
end

create trigger [dbo].[TRG_NuevoPredios] on [dbo].[predios] after insert
as
	update cuentaPredios set cuenta = cuenta + 1