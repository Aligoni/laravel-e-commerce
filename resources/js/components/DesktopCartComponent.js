import React, {useState, useEffect} from 'react'
import ReactDOM from 'react-dom'
import axios from 'axios'

export default function DesktopCartComponent () {

    return (

        <a href="/cart" className="hidden md:flex items-end mr-4 relative">
            <i
                className="cursor-pointer material-icons ml-2 hover:text-blue-500"
                style={{ fontSize: 36 }}>
                shopping_cart
            </i>
            <p className="absolute -top-2 -right-2 font-bold text-lg text-blue-700">4</p>
        </a>
    )
}

if (document.getElementById('desktopCart')) {
    ReactDOM.render(<DesktopCartComponent />, document.getElementById('desktopCart'))
}