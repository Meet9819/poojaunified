                                        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

                                        <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
                                                                            
                                       <table  id="barcode" width="100%">
                                        <tbody>
                                            <tr id='barcoderow0'>
                                              <td>
                                                 <input tabindex="0" type="text"  name="barcodeid[]" class="form-control"  placeholder="Enter Barcode " >
                                              </td>
                                               <td>
                                                 <div class="form-group col-md-12">
                                                    <a id="barcode_add_row" >Add Row</a>
                                                    <a id='barcode_delete_row'>Delete Row</a> 
                                                 </div>
                                              </td>
                                            </tr>
                                            
                                            <tr id='barcoderow1'></tr>

                                            <input type="hidden" name="total_barcode" id="total_barcode" value="1" />
                                          </tbody>
                                      </table>
                                     

                                      <script type="text/javascript">
                                        $(document).ready(function(){
                                          var i=1;
                                         $("#barcode_add_row").click(function(){
                                          $('#barcoderow'+i).html("<td>   <div class='form-group col-md-12'><input tabindex='10'  name='barcodeid[]' type='text' placeholder='Barcode'  class='form-control'></div></td>");

                                          $('#barcode').append('<tr id="barcoderow'+(i+1)+'"></tr>');
                                          i++;
                                          $('#total_barcode').val(i);
                                        });
                                        $("#barcode_delete_row").click(function(){
                                               if(i>1){
                                               $("#barcoderow"+(i-1)).html('');
                                               i--;
                                               $('#total_barcode').val(i);
                                               }
                                           });
                                        });
                                    </script>