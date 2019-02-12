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
            CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo bigint
            )
            RETURNS bigint AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo bigint)
              OWNER TO postgres;


              CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo time
            )
            RETURNS TIME WITHOUT TIME ZONE AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo time)
              OWNER TO postgres;

              CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo date,
              en_caso_nulo date
            )
            RETURNS date AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo date, en_caso_nulo date)
              OWNER TO postgres;

             CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo integer,
              en_caso_nulo integer
            )
            RETURNS integer AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo integer, en_caso_nulo integer)
              OWNER TO postgres;


            CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo numeric
            )
            RETURNS numeric AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo numeric)
              OWNER TO postgres;

              CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo varchar
            )
            RETURNS varchar AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo varchar)
              OWNER TO postgres;

             CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo date
            )
            RETURNS date AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo date)
              OWNER TO postgres;

             CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo bigint,
              en_caso_nulo bigint
            )
            RETURNS bigint AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo bigint, en_caso_nulo bigint)
              OWNER TO postgres;

              CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo varchar,
              en_caso_nulo varchar
            )
            RETURNS varchar AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo varchar, en_caso_nulo varchar)
              OWNER TO postgres;

            CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo numeric,
              en_caso_nulo numeric
            )
            RETURNS numeric AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo numeric, en_caso_nulo numeric)
              OWNER TO postgres;

             CREATE OR REPLACE FUNCTION public.fn_nvl (
              campo integer
            )
            RETURNS integer AS
            $body$
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
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_nvl (campo integer)
              OWNER TO postgres;

             CREATE OR REPLACE FUNCTION public.fn_to_char (
              camp real
            )
            RETURNS varchar AS
            $body$
            DECLARE
             salida varchar;
            BEGIN

            salida='';

                select    replace ((to_char(camp, '99999999999')), ' ', '')
             into STRICT salida
             from public.dual;

                  return salida;

            END;
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_to_char (camp real)
              OWNER TO postgres;

            CREATE OR REPLACE FUNCTION public.fn_to_char (
              camp double precision
            )
            RETURNS varchar AS
            $body$
            DECLARE
             salida varchar;
            BEGIN

            salida='';

                select    replace ((to_char(camp, '99999999999')), ' ', '')
             into STRICT salida
             from public.dual;

                  return salida;

            END;
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_to_char (camp double precision)
              OWNER TO postgres;

              CREATE OR REPLACE FUNCTION public.fn_to_char (
              camp integer
            )
            RETURNS varchar AS
            $body$
            DECLARE
             salida varchar;
            BEGIN

            salida='';

                select    replace ((to_char(camp, '999999999')), ' ', '')
             into STRICT salida
             from public.dual;

                  return salida;

            END;
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.fn_to_char (camp integer)
              OWNER TO postgres;

             CREATE OR REPLACE FUNCTION public.last_day (
              date
            )
            RETURNS date AS
            $body$
              SELECT (date_trunc('MONTH', $1) + INTERVAL '1 MONTH - 1 day')::DATE;
            $body$
            LANGUAGE 'sql'
            IMMUTABLE
            RETURNS NULL ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.last_day (date)
              OWNER TO postgres;

             CREATE OR REPLACE FUNCTION public.restar_fechas (
              fecha_ini date,
              fecha_fin date
            )
            RETURNS varchar AS
            $body$
            DECLARE
             salida varchar;
            BEGIN

            salida='';


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


                  return salida;

            END;
            $body$
            LANGUAGE 'plpgsql'
            VOLATILE
            CALLED ON NULL INPUT
            SECURITY INVOKER
            COST 100;

            ALTER FUNCTION public.restar_fechas (fecha_ini date, fecha_fin date)
              OWNER TO postgres;

              CREATE OR REPLACE FUNCTION public.fn_trae_integrantes (
                s_compromisos_maestros_id integer
              )
              RETURNS varchar AS
              $body$
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
              $body$
              LANGUAGE 'plpgsql'
              VOLATILE
              CALLED ON NULL INPUT
              SECURITY INVOKER
              COST 100;

              ALTER FUNCTION public.fn_trae_integrantes (s_compromisos_maestros_id integer)
                OWNER TO postgres;

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
