DELIMITER |

CREATE TRIGGER actualizarPrecioPedido BEFORE INSERT ON contenido_pedidos
  FOR EACH ROW BEGIN  
    UPDATE pedidos SET precioTotalPedido = precioTotalPedido + $incremento WHERE idPedido = $idPedido;
  END
|
