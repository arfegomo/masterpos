{% block contenido %}

<hr>

	<div class="table-responsive">



		<table width="100%" class="table table-striped" >



	      <thead>



	        <tr>



	      <th>Fecha</th>

			  <th>Venta</th>	

        </tr>



	      </thead>



	      <tbody>

			{% set total = 0 %}


	        {% for venta in ventas %}



				<tr>



		          <td>{{ venta.fecha }}</td>

		          <td>{{ venta.venta }}</td>

		       

		          {% set total = (total + venta.venta) %}



		        </tr>

		     {% endfor %}

		     <tr>
		        <td colspan="1"><b>
              <font size="5">TOTAL</font>
            </td>
            <td>{{ total }}</font></td>
		     </tr>



	      </tbody>

		

	    </table>

	    		  

	    </div>



	<hr>



{% endblock %}
