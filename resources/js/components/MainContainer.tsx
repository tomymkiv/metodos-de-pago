import React from 'react'

export default function MainContainer({ children }: { children: React.ReactNode }) {
    return (
        <section className='text-gray-300 min-h-screen bg-gray-950 flex items-center justify-center flex-col'>
            {children}
        </section>
    )
}
