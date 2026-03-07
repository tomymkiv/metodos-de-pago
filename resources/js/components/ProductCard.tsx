import React from "react"

export default function ProductCard({ name, price, quantity }: { name: string, price: number, quantity: number }) {
    return (
        <div className="flex flex-col gap-3 p-2 bg-gray-800 rounded-md shadow-sm shadow-gray-300">
            <h2>{name}</h2>
            <p>${price}</p>
            <p>Cantidad: {quantity}</p>
        </div>
    )
}