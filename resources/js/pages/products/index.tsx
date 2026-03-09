import { route } from 'ziggy-js'
import { Ziggy } from '@/ziggy'
import MainContainer from "@/components/MainContainer";
import ProductCard from "@/components/ProductCard";
import { useForm } from "@inertiajs/react";
import { useState } from 'react';

interface Product {
    id: number,
    nombre: string,
    precio: number,
    cantidad: number,
}

export default function index({ products }: { products: Product[] }) {
    const [buttonText, setButtonText] = useState('');
    const [idProduct, setIdProduct] = useState(Number);
    const { post, processing } = useForm<Product>({
        id: 0,
        nombre: '',
        precio: 0,
        cantidad: 0,
    });

    const handleSubmit = (e: React.ChangeEvent<HTMLFormElement>) => {
        e.preventDefault();

        // identifico cada boton, para aplicar el método correspondiente
        buttonText.includes('Mercado') && post(route('mercadopago', idProduct, true, Ziggy));
        buttonText.includes('Pay') && console.log('paypal');
        buttonText.includes('Stripe') && console.log('stripe');
    }
    const handleButton = (pr: number, e: HTMLButtonElement) =>{
        setIdProduct(pr); // id del producto
        setButtonText(e.textContent) // detecto el boton (de qué plataforma)
    }
    return (
        <MainContainer>
            <div className="my-50 space-y-5 w-full max-w-md md:max-w-xl lg:max-w-2xl mx-auto">
                <h2>Productos (mercadopago)</h2>
                <form onSubmit={handleSubmit} className="space-y-20">
                    {
                        products.map((pr, id) => (
                            <div key={id} className="flex flex-col gap-3">
                                <ProductCard
                                    name={pr.nombre}
                                    price={pr.precio}
                                    quantity={pr.cantidad}
                                />
                                <button disabled={processing} onClick={(e) => handleButton(products[id].id, e.currentTarget)} type="submit" className="p-3 bg-gray-800 hover:bg-blue-600 transition-colors duration-300 cursor-pointer rounded-lg hover:text-black">Pagar con MercadoPago</button>
                                <button disabled={processing} onClick={(e) => handleButton(products[id].id, e.currentTarget)} type="submit" className="p-3 bg-gray-800 hover:bg-blue-400 transition-colors duration-300 cursor-pointer rounded-lg hover:text-black">Pagar con PayPal</button>
                                <button disabled={processing} onClick={(e) => handleButton(products[id].id, e.currentTarget)} type="submit" className="p-3 bg-gray-800 hover:bg-purple-600 transition-colors duration-300 cursor-pointer rounded-lg hover:text-gray-200">Pagar con Stripe</button>
                            </div>
                        ))
                    }
                </form>
            </div>
        </MainContainer>
    )
}