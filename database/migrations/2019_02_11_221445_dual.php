<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Dual extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dual', function (Blueprint $table) {
            $table->string('x');
            $table->primary('x');
        });

        DB::table('dual')->insert([
            'x' => 'x'
        ]);

          DB::unprepared("

          CREATE FUNCTION public.fn_mes(v_mes integer) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
          BEGIN
          SALIDA:='';

              if (v_mes=1)  then
              SELECT 'ENERO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=2) then
              SELECT 'FEBRERO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=3) then
              SELECT 'MARZO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=4) then
              SELECT 'ABRIL'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=5) then
              SELECT 'MAYO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=6) then
              SELECT 'JUNIO'
              INTO STRICT SALIDA
              FROM DUAL;
              elsif (v_mes=7) then
              SELECT 'JULIO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=8) then
              SELECT 'AGOSTO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=9) then
              SELECT 'SEPTIEMBRE'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=10)  then
              SELECT 'OCTUBRE'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=11)  then
              SELECT 'NOVIEMBRE'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=12)  then
              SELECT 'DICIEMBRE'
              INTO STRICT SALIDA
              FROM public.DUAL;


              end if;


                return SALIDA;

          END;
          $$;




          CREATE FUNCTION public.fn_mes(v_mes character varying) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
          BEGIN
          SALIDA:='';

              if ((v_mes='01') or (v_mes='1')) then
              SELECT 'ENERO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif ((v_mes='02') or (v_mes='2')) then
              SELECT 'FEBRERO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif ((v_mes='03') or (v_mes='3')) then
              SELECT 'MARZO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif ((v_mes='04') or (v_mes='4')) then
              SELECT 'ABRIL'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif ((v_mes='05') or (v_mes='5')) then
              SELECT 'MAYO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif ((v_mes='06') or (v_mes='6')) then
              SELECT 'JUNIO'
              INTO STRICT SALIDA
              FROM DUAL;
              elsif ((v_mes='07') or (v_mes='7')) then
              SELECT 'JULIO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif ((v_mes='08') or (v_mes='8')) then
              SELECT 'AGOSTO'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif ((v_mes='09') or (v_mes='9')) then
              SELECT 'SEPTIEMBRE'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes='10')  then
              SELECT 'OCTUBRE'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes='11')  then
              SELECT 'NOVIEMBRE'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes='12')  then
              SELECT 'DICIEMBRE'
              INTO STRICT SALIDA
              FROM public.DUAL;


              end if;


                return SALIDA;

          END;
          $$;




          CREATE FUNCTION public.fn_mes2(v_mes integer) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
          BEGIN
          SALIDA:='';

              if (v_mes=1)  then
              SELECT 'Ene'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=2) then
              SELECT 'Feb'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=3) then
              SELECT 'Mar'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=4) then
              SELECT 'Abr'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=5) then
              SELECT 'May'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=6) then
              SELECT 'Jun'
              INTO STRICT SALIDA
              FROM DUAL;
              elsif (v_mes=7) then
              SELECT 'Jul'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=8) then
              SELECT 'Ago'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=9) then
              SELECT 'Sep'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=10)  then
              SELECT 'Oct'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=11)  then
              SELECT 'Nov'
              INTO STRICT SALIDA
              FROM public.DUAL;
              elsif (v_mes=12)  then
              SELECT 'Dic'
              INTO STRICT SALIDA
              FROM public.DUAL;


              end if;


                return SALIDA;

          END;
          $$;




          CREATE FUNCTION public.fn_nvl(campo date) RETURNS date
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida date;
          BEGIN

          salida='01/01/1900' ;

              select    CASE WHEN campo is null
                     THEN '01/01/1900'
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;




          CREATE FUNCTION public.fn_nvl(campo integer) RETURNS integer
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida integer;
          BEGIN

          salida=0;

              select    CASE WHEN campo is null
                     THEN 0
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;



          CREATE FUNCTION public.fn_nvl(campo bigint) RETURNS bigint
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida bigint;
          BEGIN

          salida=0;

              select    CASE WHEN campo is null
                     THEN 0
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;


          CREATE FUNCTION public.fn_nvl(campo numeric) RETURNS numeric
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida numeric;
          BEGIN

          salida=0;

              select    CASE WHEN campo is null
                     THEN 0
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;


          CREATE FUNCTION public.fn_nvl(campo time without time zone) RETURNS time without time zone
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida time;
          BEGIN

          salida='00:00:00' ;

              select    CASE WHEN campo is null
                     THEN '00:00:00'
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;




          CREATE FUNCTION public.fn_nvl(campo character varying) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
          BEGIN

          salida='';

              select    CASE WHEN campo is null
                     THEN ''
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;



          CREATE FUNCTION public.fn_nvl(campo date, en_caso_nulo date) RETURNS date
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida DATE;
          BEGIN

          salida='01/01/1900';

              select    CASE WHEN campo is null
                     THEN en_caso_nulo
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;




          CREATE FUNCTION public.fn_nvl(campo integer, en_caso_nulo integer) RETURNS integer
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida integer;
          BEGIN

          salida=0;

              select    CASE WHEN campo is null
                     THEN en_caso_nulo
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;




          CREATE FUNCTION public.fn_nvl(campo bigint, en_caso_nulo bigint) RETURNS bigint
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida bigint;
          BEGIN

          salida=0;

              select    CASE WHEN campo is null
                     THEN en_caso_nulo
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;



          CREATE FUNCTION public.fn_nvl(campo numeric, en_caso_nulo numeric) RETURNS numeric
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida numeric;
          BEGIN

          salida=0;

              select    CASE WHEN campo is null
                     THEN en_caso_nulo
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;



          CREATE FUNCTION public.fn_nvl(campo character varying, en_caso_nulo character varying) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
          BEGIN

          salida='';

              select    CASE WHEN campo is null
                     THEN en_caso_nulo
                     ELSE campo
                     END
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;



          CREATE FUNCTION public.fn_to_char(camp real) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
          BEGIN

          salida='';

              select    replace ((to_char(camp, '99999999999')), ' ', '')
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;




          CREATE FUNCTION public.fn_to_char(camp double precision) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
          BEGIN

          salida='';

              select    replace ((to_char(camp, '99999999999')), ' ', '')
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;



          CREATE FUNCTION public.fn_to_char(camp integer) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
          BEGIN

          salida='';

              select    replace ((to_char(camp, '999999999')), ' ', '')
           into STRICT salida
           from public.dual;

                return salida;

          END;
          $$;




          CREATE FUNCTION public.fn_trae_integrantes(s_compromisos_maestros_id integer) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
            rec record;
            sw BOOLEAN;
          BEGIN

          salida='';
          sw=false;
          	  begin
                for rec in    SELECT  fn_nvl(p1.primer_nombre)||' '||fn_nvl(p1.segundo_nombre)
                ||' '||fn_nvl(p1.primer_apellido)||' '||fn_nvl(p1.segundo_apellido) nombres
          FROM  compromisos_integrantes ci,
                empleados em,
                personas p1
          where ci.compromisos_maestros_id= s_compromisos_maestros_id
            and ci.integrantes_id  = em.id
            and em.persona_id = p1.id
            loop
            if (sw=FALSE) then
                salida=rec.nombres;
                else
                  salida=salida||','|| rec.nombres;
            end if;
                sw=true;
             end loop
            ;


               EXCEPTION WHEN  others THEN
          	    salida:=public.fun_nombreconstein(SQLERRM);
            	end;

                return salida;

          END;
          $$;




          CREATE FUNCTION public.fn_ultimo_dia_mes(s_mes integer, s_anno integer) RETURNS integer
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida integer;
           fecha date;
          BEGIN
          SALIDA:=0;

           SELECT (date_trunc('MONTH', to_date('1/'||s_mes||'/'||s_anno,'dd/mm/yyyy')) + INTERVAL '1 MONTH - 1 day')::DATE
           into strict fecha
           from dual;

          select round(extract(day from fecha))
          into strict SALIDA
          from dual;

                return SALIDA;

          END;
          $$;




          CREATE FUNCTION public.pro_calcula_estadist_actividades(s_proyecto_id integer, s_mes integer, s_anno integer) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
            rec record;
             rec2 record;

             rec_lluvias record;
            p_descmes varchar(100):='Mes';
            p_trabajado_promedio_dia_am real:=0;
            p_trabajado_promedio_dia_pm real:=0;
            p_cantidad_jornales integer:=0;

             p_trabajado_promedio_dia real:=0;
             p_numero_dias_mes integer:=0;

            p_total_pm integer:=0;
            p_total_am integer:=0;

            p_suma_am real:=0;
            p_contar_am real:=0;
            p_promedio_am real:=0;

            p_suma_pm real:=0;
            p_contar_pm real:=0;
            p_promedio_pm real:=0;

            s_am_dia_1 integer:=0;
            s_am_dia_2 integer:=0;
            s_am_dia_3 integer:=0;
            s_am_dia_4 integer:=0;
            s_am_dia_5 integer:=0;
            s_am_dia_6 integer:=0;
            s_am_dia_7 integer:=0;
            s_am_dia_8 integer:=0;
            s_am_dia_9 integer:=0;
            s_am_dia_10 integer:=0;
            s_am_dia_11 integer:=0;
            s_am_dia_12 integer:=0;
            s_am_dia_13 integer:=0;
            s_am_dia_14 integer:=0;
            s_am_dia_15 integer:=0;
            s_am_dia_16 integer:=0;
            s_am_dia_17 integer:=0;
            s_am_dia_18 integer:=0;
            s_am_dia_19 integer:=0;
            s_am_dia_20 integer:=0;
            s_am_dia_21 integer:=0;
            s_am_dia_22 integer:=0;
            s_am_dia_23 integer:=0;
            s_am_dia_24 integer:=0;
            s_am_dia_25 integer:=0;
            s_am_dia_26 integer:=0;
            s_am_dia_27 integer:=0;
            s_am_dia_28 integer:=0;
            s_am_dia_29 integer:=0;
            s_am_dia_30 integer:=0;
            s_am_dia_31 integer:=0;

            s_pm_dia_1 integer:=0;
            s_pm_dia_2 integer:=0;
            s_pm_dia_3 integer:=0;
            s_pm_dia_4 integer:=0;
            s_pm_dia_5 integer:=0;
            s_pm_dia_6 integer:=0;
            s_pm_dia_7 integer:=0;
            s_pm_dia_8 integer:=0;
            s_pm_dia_9 integer:=0;
            s_pm_dia_10 integer:=0;
            s_pm_dia_11 integer:=0;
            s_pm_dia_12 integer:=0;
            s_pm_dia_13 integer:=0;
            s_pm_dia_14 integer:=0;
            s_pm_dia_15 integer:=0;
            s_pm_dia_16 integer:=0;
            s_pm_dia_17 integer:=0;
            s_pm_dia_18 integer:=0;
            s_pm_dia_19 integer:=0;
            s_pm_dia_20 integer:=0;
            s_pm_dia_21 integer:=0;
            s_pm_dia_22 integer:=0;
            s_pm_dia_23 integer:=0;
            s_pm_dia_24 integer:=0;
            s_pm_dia_25 integer:=0;
            s_pm_dia_26 integer:=0;
            s_pm_dia_27 integer:=0;
            s_pm_dia_28 integer:=0;
            s_pm_dia_29 integer:=0;
            s_pm_dia_30 integer:=0;
            s_pm_dia_31 integer:=0;

              s_dia1 integer:=0;
            s_dia2 integer:=0;
            s_dia3 integer:=0;
            s_dia4 integer:=0;
            s_dia5 integer:=0;
            s_dia6 integer:=0;
            s_dia7 integer:=0;
            s_dia8 integer:=0;
            s_dia9 integer:=0;
            s_dia10 integer:=0;
            s_dia11 integer:=0;
            s_dia12 integer:=0;
            s_dia13 integer:=0;
            s_dia14 integer:=0;
            s_dia15 integer:=0;
            s_dia16 integer:=0;
            s_dia17 integer:=0;
            s_dia18 integer:=0;
            s_dia19 integer:=0;
            s_dia20 integer:=0;
            s_dia21 integer:=0;
            s_dia22 integer:=0;
            s_dia23 integer:=0;
            s_dia24 integer:=0;
            s_dia25 integer:=0;
            s_dia26 integer:=0;
            s_dia27 integer:=0;
            s_dia28 integer:=0;
            s_dia29 integer:=0;
            s_dia30 integer:=0;
            s_dia31 integer:=0;

          BEGIN
          salida='Estaticas Actualizadas';

                      select fn_mes2(s_mes)
                      into strict p_descmes
                      from dual;

                      select fn_ultimo_dia_mes(s_mes,s_anno)
                      into strict p_numero_dias_mes
                      from dual;



              begin

                  delete from actividades_estaditica_am
                  where  anno=s_anno
                  and mes=s_mes
                  and proyecto_id=s_proyecto_id;

                  delete from actividades_estaditica_pm
                  where  anno=s_anno
                  and mes=s_mes
                  and proyecto_id=s_proyecto_id;

                  DELETE FROM  actividades_lluvias
                   WHERE anno=s_anno
                     and mes=s_mes ;

                     s_dia1= 0;
            s_dia2= 0;
            s_dia3= 0;
            s_dia4= 0;
            s_dia5= 0;
            s_dia6= 0;
            s_dia7= 0;
            s_dia8= 0;
            s_dia9= 0;
            s_dia10= 0;
            s_dia11= 0;
            s_dia12= 0;
            s_dia13= 0;
            s_dia14= 0;
            s_dia15= 0;
            s_dia16= 0;
            s_dia17= 0;
            s_dia18= 0;
            s_dia19= 0;
            s_dia20= 0;
            s_dia21= 0;
            s_dia22= 0;
            s_dia23= 0;
            s_dia24= 0;
            s_dia25= 0;
            s_dia26= 0;
            s_dia27= 0;
            s_dia28= 0;
            s_dia29= 0;
            s_dia30= 0;
            s_dia31= 0;
                  for   rec_lluvias in select mm,to_char( id  , 'dd')::integer dia
                  from registro_lluvia
                  where  to_char(id  , 'MM')::integer=s_mes
                  and to_char(id , 'yyyy')::integer=s_anno
                  loop


            if (rec_lluvias.dia=1) then s_dia1=rec_lluvias.mm;
            elsif (rec_lluvias.dia=2) then s_dia2=rec_lluvias.mm;
             elsif (rec_lluvias.dia=2) then s_dia2 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=3) then s_dia3 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=4) then s_dia4 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=5) then s_dia5 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=6) then s_dia6 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=7) then s_dia7 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=8) then s_dia8 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=9) then s_dia9 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=10) then s_dia10 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=11) then s_dia11 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=12) then s_dia12 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=13) then s_dia13 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=14) then s_dia14 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=15) then s_dia15 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=16) then s_dia16 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=17) then s_dia17 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=18) then s_dia18 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=19) then s_dia19 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=20) then s_dia20 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=21) then s_dia21 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=22) then s_dia22 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=23) then s_dia23 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=24) then s_dia24 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=25) then s_dia25 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=26) then s_dia26 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=27) then s_dia27 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=28) then s_dia28 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=29) then s_dia29 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=30) then s_dia30 =rec_lluvias.mm;
           elsif (rec_lluvias.dia=31) then s_dia31 =rec_lluvias.mm;
            end if;

                  end loop
                  ;


                 INSERT INTO  actividades_lluvias
          (
            anno,
            mes,
            dia1,
            dia2,
            dia3,
            dia4,
            dia5,
            dia6,
            dia7,
            dia8,
            dia9,
            dia10,
            dia11,
            dia12,
            dia13,
            dia14,
            dia15,
            dia16,
            dia17,
            dia18,
            dia19,
            dia20,
            dia21,
            dia22,
            dia23,
            dia24,
            dia25,
            dia26,
            dia27,
            dia28,
            dia29,
            dia30,
            dia31
          )
          VALUES (
            s_anno,
            s_mes,
            s_dia1,
            s_dia2,
            s_dia3,
            s_dia4,
            s_dia5,
            s_dia6,
            s_dia7,
            s_dia8,
            s_dia9,
            s_dia10,
            s_dia11,
            s_dia12,
            s_dia13,
            s_dia14,
            s_dia15,
            s_dia16,
            s_dia17,
            s_dia18,
            s_dia19,
            s_dia20,
            s_dia21,
            s_dia22,
            s_dia23,
            s_dia24,
            s_dia25,
            s_dia26,
            s_dia27,
            s_dia28,
            s_dia29,
            s_dia30,
            s_dia31
          );



                   for rec in  SELECT  ar.actividades_id
                  FROM  actividades_registro ar,
                        actividades ac
                  where ac.proyecto_id=s_proyecto_id
                  and ac.id= ar.actividades_id
                  and ar.actividades_tipo_id=1
                  and    to_char( ar.fecha  , 'MM')::integer=s_mes
                  and to_char( ar.fecha  , 'yyyy')::integer=s_anno
                  group by   ar.actividades_id
                   loop

                   s_am_dia_1= 0;
            s_am_dia_2= 0;
            s_am_dia_3= 0;
            s_am_dia_4= 0;
            s_am_dia_5= 0;
            s_am_dia_6= 0;
            s_am_dia_7= 0;
            s_am_dia_8= 0;
            s_am_dia_9= 0;
            s_am_dia_10= 0;
            s_am_dia_11= 0;
            s_am_dia_12= 0;
            s_am_dia_13= 0;
            s_am_dia_14= 0;
            s_am_dia_15= 0;
            s_am_dia_16= 0;
            s_am_dia_17= 0;
            s_am_dia_18= 0;
            s_am_dia_19= 0;
            s_am_dia_20= 0;
            s_am_dia_21= 0;
            s_am_dia_22= 0;
            s_am_dia_23= 0;
            s_am_dia_24= 0;
            s_am_dia_25= 0;
            s_am_dia_26= 0;
            s_am_dia_27= 0;
            s_am_dia_28= 0;
            s_am_dia_29= 0;
            s_am_dia_30= 0;
            s_am_dia_31= 0;

            s_pm_dia_1= 0;
            s_pm_dia_2= 0;
            s_pm_dia_3= 0;
            s_pm_dia_4= 0;
            s_pm_dia_5= 0;
            s_pm_dia_6= 0;
            s_pm_dia_7= 0;
            s_pm_dia_8= 0;
            s_pm_dia_9= 0;
            s_pm_dia_10= 0;
            s_pm_dia_11= 0;
            s_pm_dia_12= 0;
            s_pm_dia_13= 0;
            s_pm_dia_14= 0;
            s_pm_dia_15= 0;
            s_pm_dia_16= 0;
            s_pm_dia_17= 0;
            s_pm_dia_18= 0;
            s_pm_dia_19= 0;
            s_pm_dia_20= 0;
            s_pm_dia_21= 0;
            s_pm_dia_22= 0;
            s_pm_dia_23= 0;
            s_pm_dia_24= 0;
            s_pm_dia_25= 0;
            s_pm_dia_26= 0;
            s_pm_dia_27= 0;
            s_pm_dia_28= 0;
            s_pm_dia_29= 0;
            s_pm_dia_30= 0;
            s_pm_dia_31= 0;
            p_total_pm =0;
            p_total_am =0;
                       for rec2 in SELECT  ar.actividades_id,ar.empleados_id,ar.fecha,max(ar.hora) hora,to_char( ar.fecha  , 'dd')::integer dia,

                        (
                        case
                          when (max(ar.hora) <= '12:00:00') then 'AM' ELSE 'PM'
                        end
                        ) jornada
                        FROM  actividades_registro ar,
                              actividades ac
                        where ac.proyecto_id=s_proyecto_id
                        and ac.id = rec.actividades_id
                        and ac.id= ar.actividades_id
                        and ar.actividades_tipo_id=1
                        and    to_char( ar.fecha  , 'MM')::integer=s_mes
                        and to_char( ar.fecha  , 'yyyy')::integer=s_anno
                        group by   ar.actividades_id,ar.empleados_id,ar.fecha
                        loop

                         if (rec2.jornada='AM') then
                          p_total_am=p_total_am+1;
                         elsif (rec2.jornada='PM') then
                          p_total_pm=p_total_pm+1;
                         end if;


                           if (rec2.dia=1 and (rec2.jornada='AM')) then
                             s_am_dia_1=s_am_dia_1+1;
                           elsif (rec2.dia=1 and (rec2.jornada='PM')) then
                             s_pm_dia_1=s_pm_dia_1+1;
                           elsif (rec2.dia=2 and (rec2.jornada='AM')) then
                             s_am_dia_2=s_am_dia_2+1;
                          elsif (rec2.dia=2 and (rec2.jornada='PM')) then
                            s_pm_dia_2=s_pm_dia_2+1;
                           elsif (rec2.dia=3 and (rec2.jornada='AM')) then
                             s_am_dia_3=s_am_dia_3+1;
                          elsif (rec2.dia=3 and (rec2.jornada='PM')) then
                            s_pm_dia_3=s_pm_dia_3+1;
                           elsif (rec2.dia=4 and (rec2.jornada='AM')) then s_am_dia_4=s_am_dia_4+1;
                           elsif (rec2.dia=4 and (rec2.jornada='PM')) then s_pm_dia_4=s_pm_dia_4+1;
                           elsif (rec2.dia=5 and (rec2.jornada='AM')) then s_am_dia_5=s_am_dia_5+1;
                           elsif (rec2.dia=5 and (rec2.jornada='PM')) then s_pm_dia_5=s_pm_dia_5+1;
                           elsif (rec2.dia=6 and (rec2.jornada='AM')) then s_am_dia_6=s_am_dia_6+1;
                           elsif (rec2.dia=6 and (rec2.jornada='PM')) then s_pm_dia_6=s_pm_dia_6+1;

                             elsif (rec2.dia=7 and (rec2.jornada='PM')) then s_pm_dia_7 =s_pm_dia_7+1;
                             elsif (rec2.dia=7 and (rec2.jornada='AM')) then s_am_dia_7 =s_am_dia_7+1;

                          elsif (rec2.dia=8 and (rec2.jornada='PM')) then s_pm_dia_8 =s_pm_dia_8+1;
                          elsif (rec2.dia=8 and (rec2.jornada='AM')) then s_am_dia_8 =s_am_dia_8+1;

           elsif (rec2.dia=9 and (rec2.jornada='PM')) then s_pm_dia_9 =s_pm_dia_9+1;	 elsif (rec2.dia=9 and (rec2.jornada='AM')) then s_am_dia_9 =s_am_dia_9+1;
           elsif (rec2.dia=10 and (rec2.jornada='PM')) then s_pm_dia_10 =s_pm_dia_10+1;	 elsif (rec2.dia=10 and (rec2.jornada='AM')) then s_am_dia_10 =s_am_dia_10+1;
           elsif (rec2.dia=11 and (rec2.jornada='PM')) then s_pm_dia_11 =s_pm_dia_11+1;	 elsif (rec2.dia=11 and (rec2.jornada='AM')) then s_am_dia_11 =s_am_dia_11+1;
           elsif (rec2.dia=12 and (rec2.jornada='PM')) then s_pm_dia_12 =s_pm_dia_12+1;	 elsif (rec2.dia=12 and (rec2.jornada='AM')) then s_am_dia_12 =s_am_dia_12+1;
           elsif (rec2.dia=13 and (rec2.jornada='PM')) then s_pm_dia_13 =s_pm_dia_13+1;	 elsif (rec2.dia=13 and (rec2.jornada='AM')) then s_am_dia_13 =s_am_dia_13+1;
           elsif (rec2.dia=14 and (rec2.jornada='PM')) then s_pm_dia_14 =s_pm_dia_14+1;	 elsif (rec2.dia=14 and (rec2.jornada='AM')) then s_am_dia_14 =s_am_dia_14+1;
           elsif (rec2.dia=15 and (rec2.jornada='PM')) then s_pm_dia_15 =s_pm_dia_15+1;	 elsif (rec2.dia=15 and (rec2.jornada='AM')) then s_am_dia_15 =s_am_dia_15+1;
           elsif (rec2.dia=16 and (rec2.jornada='PM')) then s_pm_dia_16 =s_pm_dia_16+1;	 elsif (rec2.dia=16 and (rec2.jornada='AM')) then s_am_dia_16 =s_am_dia_16+1;
           elsif (rec2.dia=17 and (rec2.jornada='PM')) then s_pm_dia_17 =s_pm_dia_17+1;	 elsif (rec2.dia=17 and (rec2.jornada='AM')) then s_am_dia_17 =s_am_dia_17+1;
           elsif (rec2.dia=18 and (rec2.jornada='PM')) then s_pm_dia_18 =s_pm_dia_18+1;	 elsif (rec2.dia=18 and (rec2.jornada='AM')) then s_am_dia_18 =s_am_dia_18+1;
           elsif (rec2.dia=19 and (rec2.jornada='PM')) then s_pm_dia_19 =s_pm_dia_19+1;	 elsif (rec2.dia=19 and (rec2.jornada='AM')) then s_am_dia_19 =s_am_dia_19+1;
           elsif (rec2.dia=20 and (rec2.jornada='PM')) then s_pm_dia_20 =s_pm_dia_20+1;	 elsif (rec2.dia=20 and (rec2.jornada='AM')) then s_am_dia_20 =s_am_dia_20+1;
           elsif (rec2.dia=21 and (rec2.jornada='PM')) then s_pm_dia_21 =s_pm_dia_21+1;	 elsif (rec2.dia=21 and (rec2.jornada='AM')) then s_am_dia_21 =s_am_dia_21+1;
           elsif (rec2.dia=22 and (rec2.jornada='PM')) then s_pm_dia_22 =s_pm_dia_22+1;	 elsif (rec2.dia=22 and (rec2.jornada='AM')) then s_am_dia_22 =s_am_dia_22+1;
           elsif (rec2.dia=23 and (rec2.jornada='PM')) then s_pm_dia_23 =s_pm_dia_23+1;	 elsif (rec2.dia=23 and (rec2.jornada='AM')) then s_am_dia_23 =s_am_dia_23+1;
           elsif (rec2.dia=24 and (rec2.jornada='PM')) then s_pm_dia_24 =s_pm_dia_24+1;	 elsif (rec2.dia=24 and (rec2.jornada='AM')) then s_am_dia_24 =s_am_dia_24+1;
           elsif (rec2.dia=25 and (rec2.jornada='PM')) then s_pm_dia_25 =s_pm_dia_25+1;	 elsif (rec2.dia=25 and (rec2.jornada='AM')) then s_am_dia_25 =s_am_dia_25+1;
           elsif (rec2.dia=26 and (rec2.jornada='PM')) then s_pm_dia_26 =s_pm_dia_26+1;	 elsif (rec2.dia=26 and (rec2.jornada='AM')) then s_am_dia_26 =s_am_dia_26+1;
           elsif (rec2.dia=27 and (rec2.jornada='PM')) then s_pm_dia_27 =s_pm_dia_27+1;	 elsif (rec2.dia=27 and (rec2.jornada='AM')) then s_am_dia_27 =s_am_dia_27+1;
           elsif (rec2.dia=28 and (rec2.jornada='PM')) then s_pm_dia_28 =s_pm_dia_28+1;	 elsif (rec2.dia=28 and (rec2.jornada='AM')) then s_am_dia_28 =s_am_dia_28+1;
           elsif (rec2.dia=29 and (rec2.jornada='PM')) then s_pm_dia_29 =s_pm_dia_29+1;	 elsif (rec2.dia=29 and (rec2.jornada='AM')) then s_am_dia_29 =s_am_dia_29+1;
           elsif (rec2.dia=30 and (rec2.jornada='PM')) then s_pm_dia_30 =s_pm_dia_30+1;	 elsif (rec2.dia=30 and (rec2.jornada='AM')) then s_am_dia_30 =s_am_dia_30+1;
           elsif (rec2.dia=31 and (rec2.jornada='PM')) then s_pm_dia_31 =s_pm_dia_31+1;	 elsif (rec2.dia=31 and (rec2.jornada='AM')) then s_am_dia_31 =s_am_dia_31+1;

                           end if;
                        end loop;



             p_suma_am =0;
            p_contar_am =0;
            p_promedio_am  =0;

            p_suma_pm  =0;
            p_contar_pm  =0;
            p_promedio_pm  =0;


             if ( s_am_dia_1 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_1; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_2 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_2; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_3 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_3; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_4 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_4; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_5 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_5; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_6 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_6; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_7 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_7; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_8 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_8; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_9 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_9; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_10 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_10; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_11 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_11; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_12 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_12; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_13 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_13; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_14 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_14; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_15 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_15; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_16 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_16; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_17 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_17; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_18 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_18; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_19 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_19; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_20 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_20; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_21 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_21; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_22 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_22; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_23 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_23; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_24 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_24; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_25 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_25; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_26 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_26; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_27 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_27; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_28 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_28; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_29 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_29; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_30 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_30; p_contar_am=p_contar_am+1;   end if;
           if ( s_am_dia_31 > 0 ) then  p_suma_am=p_suma_am +s_am_dia_31; p_contar_am=p_contar_am+1;   end if;

           if ( s_pm_dia_1 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_1; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_2 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_2; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_3 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_3; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_4 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_4; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_5 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_5; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_6 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_6; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_7 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_7; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_8 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_8; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_9 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_9; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_10 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_10; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_11 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_11; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_12 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_12; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_13 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_13; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_14 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_14; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_15 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_15; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_16 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_16; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_17 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_17; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_18 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_18; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_19 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_19; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_20 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_20; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_21 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_21; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_22 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_22; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_23 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_23; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_24 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_24; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_25 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_25; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_26 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_26; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_27 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_27; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_28 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_28; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_29 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_29; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_30 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_30; p_contar_pm=p_contar_pm+1;   end if;
           if ( s_pm_dia_31 > 0 ) then  p_suma_pm=p_suma_pm +s_pm_dia_31; p_contar_pm=p_contar_pm+1;   end if;


          p_trabajado_promedio_dia_am=0;
          if (p_contar_am>0) then
               p_trabajado_promedio_dia_am=p_suma_am::real/p_contar_am::real;
           end if;


          p_trabajado_promedio_dia_pm=0;
          if (p_contar_pm>0) then
               p_trabajado_promedio_dia_pm=p_suma_pm::real/p_contar_pm::real;
           end if;

           p_trabajado_promedio_dia =(p_trabajado_promedio_dia_am+p_trabajado_promedio_dia_pm)/2.0;

           p_cantidad_jornales=p_contar_am+p_contar_pm;

          INSERT INTO
            public.actividades_estaditica_am
          (
            anno,
            mes,
            descmes,
            actividad_id,
            proyecto_id,
            dia_am_1,
            dia_am_2,
            dia_am_3,
            dia_am_4,
            dia_am_5,
            dia_am_6,
            dia_am_7,
            dia_am_8,
            dia_am_9,
            dia_am_10,
            dia_am_11,
            dia_am_12,
            dia_am_13,
            dia_am_14,
            dia_am_15,
            dia_am_16,
            dia_am_17,
            dia_am_18,
            dia_am_19,
            dia_am_20,
            dia_am_21,
            dia_am_22,
            dia_am_23,
            dia_am_24,
            dia_am_25,
            dia_am_26,
            dia_am_27,
            dia_am_28,
            dia_am_29,
            dia_am_30,
            dia_am_31,
            total,
              trabajado_promedio_dia_am,
             trabajado_promedio_dia,
             cantidad_jornales,
             numero_dias_mes
          )
          VALUES (
            s_anno,
            s_mes,
            p_descmes,
            rec.actividades_id,
            s_proyecto_id,
            s_am_dia_1,
            s_am_dia_2,
            s_am_dia_3,
            s_am_dia_4,
            s_am_dia_5,
            s_am_dia_6,
            s_am_dia_7,
            s_am_dia_8,
            s_am_dia_9,
            s_am_dia_10,
            s_am_dia_11,
            s_am_dia_12,
            s_am_dia_13,
            s_am_dia_14,
            s_am_dia_15,
            s_am_dia_16,
            s_am_dia_17,
            s_am_dia_18,
            s_am_dia_19,
            s_am_dia_20,
            s_am_dia_21,
            s_am_dia_22,
            s_am_dia_23,
            s_am_dia_24,
            s_am_dia_25,
            s_am_dia_26,
            s_am_dia_27,
            s_am_dia_28,
            s_am_dia_29,
            s_am_dia_30,
            s_am_dia_31,
            p_total_am,
            p_trabajado_promedio_dia_am,
             p_trabajado_promedio_dia,
             p_cantidad_jornales,
             p_numero_dias_mes
          );



          INSERT INTO
            public.actividades_estaditica_pm
          (
            anno,
            mes,
            actividad_id,
            proyecto_id,
            dia_pm_1,
            dia_pm_2,
            dia_pm_3,
            dia_pm_4,
            dia_pm_5,
            dia_pm_6,
            dia_pm_7,
            dia_pm_8,
            dia_pm_9,
            dia_pm_10,
            dia_pm_11,
            dia_pm_12,
            dia_pm_13,
            dia_pm_14,
            dia_pm_15,
            dia_pm_16,
            dia_pm_17,
            dia_pm_18,
            dia_pm_19,
            dia_pm_20,
            dia_pm_21,
            dia_pm_22,
            dia_pm_23,
            dia_pm_24,
            dia_pm_25,
            dia_pm_26,
            dia_pm_27,
            dia_pm_28,
            dia_pm_29,
            dia_pm_30,
            dia_pm_31,
            total,
            trabajado_promedio_dia_pm
          )
          VALUES (
            s_anno,
            s_mes,
            rec.actividades_id,
            s_proyecto_id,
            s_pm_dia_1,
            s_pm_dia_2,
            s_pm_dia_3,
            s_pm_dia_4,
            s_pm_dia_5,
            s_pm_dia_6,
            s_pm_dia_7,
            s_pm_dia_8,
            s_pm_dia_9,
            s_pm_dia_10,
            s_pm_dia_11,
            s_pm_dia_12,
            s_pm_dia_13,
            s_pm_dia_14,
            s_pm_dia_15,
            s_pm_dia_16,
            s_pm_dia_17,
            s_pm_dia_18,
            s_pm_dia_19,
            s_pm_dia_20,
            s_pm_dia_21,
            s_pm_dia_22,
            s_pm_dia_23,
            s_pm_dia_24,
            s_pm_dia_25,
            s_pm_dia_26,
            s_pm_dia_27,
            s_pm_dia_28,
            s_pm_dia_29,
            s_pm_dia_30,
            s_pm_dia_31,
            p_total_pm,
             p_trabajado_promedio_dia_pm

          );

                   end loop;


               EXCEPTION WHEN  others THEN
          	    salida:=SQLERRM;
             end;

                return salida;

          END;
          $$;



          CREATE FUNCTION public.pro_calcula_estadist_compro_maestro(s_compromisos_maestros_id integer, s_mes integer, s_anno integer) RETURNS character varying
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida varchar;
            rec record;
              s_porcen_cumpli_total REAL;
              s_calificaion_mensual REAL ;
              s_calculo1 REAL ;
              s_calculo2 REAL ;
              s_clasificacion varchar;
              s_secuencia integer;
          BEGIN
          salida='Estaticas Actualizadas';

            begin
               delete from compromisos_estadisticas ce
               where id_compromiso_maestro=s_compromisos_maestros_id
               and  ce.mes=s_mes
               and ce.anno=s_anno;


               insert into compromisos_estadisticas
             SELECT cm.id id_compromiso_maestro ,emp3.id,  fn_nvl(p3.primer_nombre)||' '||fn_nvl(p3.segundo_nombre)||' '||
             fn_nvl(p3.primer_apellido)||' '||fn_nvl(p3.segundo_apellido) Responsable_compro,
             da3.descripcion_larga cargo_area,
            count(*)   Nro_Activi,
            fn_nvl(sum(
              case when(c.fecha_real_entrega- c.fecha_fin_compromiso) > 0 then
              c.fecha_real_entrega- c.fecha_fin_compromiso
              end
            ))Dias_adelanto,
             fn_nvl( sum(
              case when(c.fecha_real_entrega- c.fecha_fin_compromiso) < 0 then
              c.fecha_real_entrega- c.fecha_fin_compromiso
              else 0
              end
            ))Dias_retraso,
               fn_nvl( sum(
              case when(c.estado_compromiso_id=4 )   then 1 else 0
              end
            ))CCR,
                 fn_nvl( sum(
              case when(c.estado_compromiso_id=3 )   then 1 else 0
              end
            ))CNC ,
            fn_nvl( sum(
              case when(c.estado_compromiso_id=2 )   then 1 else 0
              end
            ))realizados ,
             fn_nvl( sum(
              case when(c.estado_compromiso_id=2 )   then 1 else 0
              end
            )/count(*))*100 porcen_cumpli
            ,0
            ,0,
            s_mes,
            s_anno,
            'Pendiente'


          FROM  compromisos_maestros cm,
                cargos ca,
                direciones_areas da,
                empleados emp1,
                personas p1,
                 empleados emp2,
                 personas p2,
                 compromisos c,
                 proyecto pr,
                 empleados emp3,
                 personas p3,
                 direciones_areas da3,
                 estado_compromiso ec
          where  cm.id=s_compromisos_maestros_id
            and to_char( c.fecha_inicio_compromiso  , 'MM')::integer=s_mes
            and to_char( c.fecha_inicio_compromiso  , 'yyyy')::integer=s_anno
            and cm.cargo_respon_revi_id=ca.id
            and cm.direciones_areas_id=da.id
            and cm.respon_id=emp1.id
            and emp1.persona_id=p1.id
            and cm.respon_revi_id=emp2.id
            and emp2.persona_id=p2.id
            and cm.id=c.compromisos_maestros_id
            and c.proyecto_id=pr.id
            and c.responsable_id  =emp3.id
            and emp3.persona_id=p3.id
            and emp3.direciones_areas_id=da3.id
            and c.estado_compromiso_id=ec.id
            group by cm.id,emp3.id,Responsable_compro, da3.descripcion_larga
                ;


               insert into compromisos_estadisticas
             SELECT cm.id id_compromiso_maestro ,
             0 id_empleado,
              'Area General' Responsable_compro,
            'Area General' cargo_area,
            count(*)   Nro_Activi,
            fn_nvl(sum(
              case when(c.fecha_real_entrega- c.fecha_fin_compromiso) > 0 then
              c.fecha_real_entrega- c.fecha_fin_compromiso
              end
            ))Dias_adelanto,
             fn_nvl( sum(
              case when(c.fecha_real_entrega- c.fecha_fin_compromiso) < 0 then
              c.fecha_real_entrega- c.fecha_fin_compromiso
              else 0
              end
            ))Dias_retraso,
               fn_nvl( sum(
              case when(c.estado_compromiso_id=4 )   then 1 else 0
              end
            ))CCR,
                 fn_nvl( sum(
              case when(c.estado_compromiso_id=3 )   then 1 else 0
              end
            ))CNC ,
            fn_nvl( sum(
              case when(c.estado_compromiso_id=2 )   then 1 else 0
              end
            ))realizados ,
             fn_nvl( sum(
              case when(c.estado_compromiso_id=2 )   then 1 else 0
              end
            )/count(*))*100 porcen_cumpli
            ,0
            ,0,
            s_mes,
            s_anno,
            'Pendiente',
            row_number() over()

          FROM  compromisos_maestros cm,
                cargos ca,
                direciones_areas da,
                empleados emp1,
                personas p1,
                 empleados emp2,
                 personas p2,
                 compromisos c,
                 proyecto pr,
                 empleados emp3,
                 personas p3,
                 direciones_areas da3,
                 estado_compromiso ec
          where  cm.id=s_compromisos_maestros_id
            and to_char( c.fecha_inicio_compromiso  , 'MM')::integer=s_mes
            and to_char( c.fecha_inicio_compromiso  , 'yyyy')::integer=s_anno
            and cm.cargo_respon_revi_id=ca.id
            and cm.direciones_areas_id=da.id
            and cm.respon_id=emp1.id
            and emp1.persona_id=p1.id
            and cm.respon_revi_id=emp2.id
            and emp2.persona_id=p2.id
            and cm.id=c.compromisos_maestros_id
            and c.proyecto_id=pr.id
            and c.responsable_id  =emp3.id
            and emp3.persona_id=p3.id
            and emp3.direciones_areas_id=da3.id
            and c.estado_compromiso_id=ec.id
            group by cm.id      ;

                s_secuencia=0;
                 for rec in  select * from compromisos_estadisticas
               where id_compromiso_maestro=s_compromisos_maestros_id
               order by empleado_id
                 loop


                 --********************************************************

                     s_calculo2=0;
                       s_calculo1=0;

                    if ((rec.cnc::real/rec.nro_activi::real)::real=0) then
                     s_calculo2=0;

                     elsif ((rec.cnc::real /rec.nro_activi::real)::real<0.02) then
                     s_calculo2=rec.porcen_cumpli::real*0.03;
                      elsif ((rec.cnc::real/rec.nro_activi::real)::real<0.05) then
                     s_calculo2=rec.porcen_cumpli::real*0.04;
                       elsif ((rec.cnc::real/rec.nro_activi::real)::real<0.07) then
                     s_calculo2=rec.porcen_cumpli::real*0.06;
                      elsif ((rec.cnc::real/rec.nro_activi::real)::real>=0.07) then
                     s_calculo2=rec.porcen_cumpli::real*0.08;

                   end if;

                   if ((rec.ccr::real/rec.nro_activi::real)::real=0) then
                     s_calculo1=0;
                     elsif ((rec.ccr::real /rec.nro_activi::real)::real<0.02) then
                     s_calculo1=rec.porcen_cumpli::real*0.02;
                      elsif ((rec.ccr::real/rec.nro_activi::real)::real<0.05) then
                     s_calculo1=rec.porcen_cumpli::real*0.03;
                       elsif ((rec.ccr::real/rec.nro_activi::real)::real<0.07) then
                     s_calculo1=rec.porcen_cumpli::real*0.05;
                      elsif ((rec.ccr::real/rec.nro_activi::real)::real>=0.07) then
                     s_calculo1=rec.porcen_cumpli::real*0.07;
                   end if;


                 s_porcen_cumpli_total = (rec.porcen_cumpli)-s_calculo1-s_calculo2;

                 if (s_porcen_cumpli_total is null) then
                     s_porcen_cumpli_total=0;
                 end if;
                 --************************FIN********************************

                --************************INICIO********************************

                 if (s_porcen_cumpli_total::real>=100) then  s_calificaion_mensual=100;
                   elsif( s_porcen_cumpli_total::real>=95 and s_porcen_cumpli_total::real<100 ) then  s_calificaion_mensual=90;
                   elsif( s_porcen_cumpli_total::real>=80 and s_porcen_cumpli_total::real<95 ) then  s_calificaion_mensual=80;
                   elsif( s_porcen_cumpli_total::real>=60 and s_porcen_cumpli_total::real<80 ) then  s_calificaion_mensual=60;
                   elsif( s_porcen_cumpli_total::real < 60 ) then  s_calificaion_mensual=40;
                 end if;

                --************************FIN********************************

                s_clasificacion='Pediente';
                  if (s_porcen_cumpli_total::real>=100) then  s_clasificacion='Excelente';
                   elsif( s_porcen_cumpli_total::real>=95 and s_porcen_cumpli_total::real<100 ) then  s_clasificacion='Sobresaliente';
                   elsif( s_porcen_cumpli_total::real>=80 and s_porcen_cumpli_total::real<95 ) then  s_clasificacion='Aceptable';
                   elsif( s_porcen_cumpli_total::real>=60 and s_porcen_cumpli_total::real<80 ) then  s_clasificacion='Insuficiente';
                   elsif( s_porcen_cumpli_total::real < 60 ) then  s_clasificacion='Deficiente';
                 end if;
                   --************************FIN********************************


                 s_secuencia=s_secuencia+1;
                update  compromisos_estadisticas ce
                set porcen_cumpli_total=s_porcen_cumpli_total,
                    calificaion_mensual=s_calificaion_mensual,
                    clasificacion=s_clasificacion,
                    secuencia=s_secuencia
               where id_compromiso_maestro=s_compromisos_maestros_id
               and  ce.mes=s_mes
               and ce.anno=s_anno
               and ce.empleado_id=rec.empleado_id
               ;


                end loop
               ;

               EXCEPTION WHEN  others THEN
          	    salida:=SQLERRM;
             end;

                return salida;

          END;
          $$;


          CREATE FUNCTION public.restar_fechas(fecha_ini date, fecha_fin date) RETURNS integer
              LANGUAGE plpgsql
              AS $$
          DECLARE
           salida integer;
           factor integer;
          BEGIN

          salida=0;


          SELECT CASE WHEN (date_part('year', age(fecha_ini, fecha_fin)) > 0) THEN
                            date_part('year', age(fecha_ini, fecha_fin)) || CASE WHEN (date_part('year', age(fecha_ini, fecha_fin)) = 1) THEN ' año  '
                                                                                                           WHEN (date_part('year', age(fecha_ini, fecha_fin)) > 1) THEN ' años ' END
                      ELSE '' END ||
                 CASE WHEN (date_part('month', age(fecha_ini, fecha_fin)) > 0) THEN
                            date_part('month', age(fecha_ini, fecha_fin)) || CASE WHEN (date_part('month', age(fecha_ini, fecha_fin)) = 1) THEN ' mes  '
                                                                                                            WHEN (date_part('month', age(fecha_ini, fecha_fin)) > 1) THEN ' meses ' END
                      ELSE '' END ||
                 CASE WHEN (date_part('day', age(fecha_ini, fecha_fin)) > 0) THEN
                            date_part('day', age(fecha_ini, fecha_fin)) || CASE WHEN (date_part('day', age(fecha_ini, fecha_fin)) = 1) THEN ' dia  '
                                                                                                          WHEN (date_part('day', age(fecha_ini, fecha_fin)) > 1) THEN ' dias ' END
                      ELSE '' END AS Periodos
                       into STRICT salida
                      from public.dual;

               factor=1;

               if (fecha_ini<fecha_fin) then
               factor=1;
               end if;

                return salida*factor;

          END;
          $$;



          CREATE TABLE public.actividades_estaditica_am (
              anno integer NOT NULL,
              mes integer NOT NULL,
              descmes character varying(100),
              actividad_id integer NOT NULL,
              proyecto_id integer DEFAULT 0 NOT NULL,
              dia_am_1 integer,
              dia_am_2 integer,
              dia_am_3 integer,
              dia_am_4 integer,
              dia_am_5 integer,
              dia_am_6 integer,
              dia_am_7 integer,
              dia_am_8 integer,
              dia_am_9 integer,
              dia_am_10 integer,
              dia_am_11 integer,
              dia_am_12 integer,
              dia_am_13 integer,
              dia_am_14 integer,
              dia_am_15 integer,
              dia_am_16 integer,
              dia_am_17 integer,
              dia_am_18 integer,
              dia_am_19 integer,
              dia_am_20 integer,
              dia_am_21 integer,
              dia_am_22 integer,
              dia_am_23 integer,
              dia_am_24 integer,
              dia_am_25 integer,
              dia_am_26 integer,
              dia_am_27 integer,
              dia_am_28 integer,
              dia_am_29 integer,
              dia_am_30 integer,
              dia_am_31 integer,
              total integer DEFAULT 0 NOT NULL,
              trabajado_promedio_dia_am real,
              trabajado_promedio_dia real DEFAULT 0 NOT NULL,
              cantidad_jornales integer DEFAULT 0 NOT NULL,
              numero_dias_mes integer DEFAULT 0 NOT NULL
          );




          CREATE TABLE public.actividades_estaditica_pm (
              anno integer NOT NULL,
              mes integer NOT NULL,
              actividad_id integer NOT NULL,
              proyecto_id integer DEFAULT 0 NOT NULL,
              dia_pm_1 integer,
              dia_pm_2 integer,
              dia_pm_3 integer,
              dia_pm_4 integer,
              dia_pm_5 integer,
              dia_pm_6 integer,
              dia_pm_7 integer,
              dia_pm_8 integer,
              dia_pm_9 integer,
              dia_pm_10 integer,
              dia_pm_11 integer,
              dia_pm_12 integer,
              dia_pm_13 integer,
              dia_pm_14 integer,
              dia_pm_15 integer,
              dia_pm_16 integer,
              dia_pm_17 integer,
              dia_pm_18 integer,
              dia_pm_19 integer,
              dia_pm_20 integer,
              dia_pm_21 integer,
              dia_pm_22 integer,
              dia_pm_23 integer,
              dia_pm_24 integer,
              dia_pm_25 integer,
              dia_pm_26 integer,
              dia_pm_27 integer,
              dia_pm_28 integer,
              dia_pm_29 integer,
              dia_pm_30 integer,
              dia_pm_31 integer,
              total integer DEFAULT 0 NOT NULL,
              trabajado_promedio_dia_pm real DEFAULT 0 NOT NULL
          );



          CREATE TABLE public.actividades_lluvias (
              anno integer NOT NULL,
              mes integer NOT NULL,
              dia1 integer,
              dia2 integer,
              dia3 integer,
              dia4 integer,
              dia5 integer,
              dia6 integer,
              dia7 integer,
              dia8 integer,
              dia9 integer,
              dia10 integer,
              dia11 integer,
              dia12 integer,
              dia13 integer,
              dia14 integer,
              dia15 integer,
              dia16 integer,
              dia17 integer,
              dia18 integer,
              dia19 integer,
              dia20 integer,
              dia21 integer,
              dia22 integer,
              dia23 integer,
              dia24 integer,
              dia25 integer,
              dia26 integer,
              dia27 integer,
              dia28 integer,
              dia29 integer,
              dia30 integer,
              dia31 integer
          );



          CREATE TABLE public.compromisos_estadisticas (
              id_compromiso_maestro integer,
              empleado_id integer DEFAULT 0 NOT NULL,
              responsable_compro text,
              cargo_area character varying(255),
              nro_activi bigint,
              dias_adelanto bigint,
              dias_retraso bigint,
              ccr bigint,
              cnc bigint,
              realizados bigint,
              porcen_cumpli real DEFAULT 0 NOT NULL,
              porcen_cumpli_total real DEFAULT 0 NOT NULL,
              calificaion_mensual real DEFAULT 0 NOT NULL,
              mes integer DEFAULT 0 NOT NULL,
              anno integer DEFAULT 0 NOT NULL,
              clasificacion character varying(100) DEFAULT 'Pendiente'::character varying NOT NULL,
              secuencia integer DEFAULT 0 NOT NULL
          );


          ");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dual');
    }
}
