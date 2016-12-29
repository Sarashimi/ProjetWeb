create or replace function addpiece(text, real, integer, integer, integer)
returns integer as
'
   declare f_titre alias for $1;
    declare f_prix alias for $2;
    declare f_cat alias for $3;
    declare f_fab alias for $4;
    declare f_mach alias for $5;
    declare retour integer;
    declare id integer;
BEGIN
    insert into piece(titre, prix, idcat, idfab, idmach) values (f_titre, f_prix, f_cat, f_fab, f_mach);
    select into id idpiece from piece where titre=f_titre and prix=f_prix  and idcat=f_cat and idfab=f_fab and idmach=f_mach;
    if not found then
	retour=0;
    else
	retour=1;
    end if;
    return retour;
end;
'
  Language plpgsql
