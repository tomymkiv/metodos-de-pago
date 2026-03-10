const Ziggy = {"url":"http:\/\/mercadopago-react.test","port":null,"defaults":{},"routes":{"index":{"uri":"\/","methods":["GET","HEAD"]},"mercadopago":{"uri":"mercadopago\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"paypal":{"uri":"paypal\/{id}","methods":["GET","HEAD"],"parameters":["id"]},"paypal.payment.success":{"uri":"paypal\/payment\/success","methods":["GET","HEAD"]},"paypal.payment.cancel":{"uri":"paypal\/payment\/cancel","methods":["GET","HEAD"]},"storage.local":{"uri":"storage\/{path}","methods":["GET","HEAD"],"wheres":{"path":".*"},"parameters":["path"]},"storage.local.upload":{"uri":"storage\/{path}","methods":["PUT"],"wheres":{"path":".*"},"parameters":["path"]}}};
if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}
export { Ziggy };
