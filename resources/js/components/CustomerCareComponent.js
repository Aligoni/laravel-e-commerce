import React, {useState, useEffect} from 'react'
import ReactDOM from 'react-dom'
import axios from 'axios'

export default function CustomerCareComponent(props) {
    return (
        <div className="cursor-pointer transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-105 w-20 h-20 flex items-center justify-center bg-blue-500" style={{borderRadius: 50}}>
            <i
                className="material-icons text-white"
                style={{ fontSize: 36 }}>
                chat
            </i>   
        </div>
    )
}

if (document.getElementById('customerCare')) {
    const element = document.getElementById("customerCare")
    const props = Object.assign({}, element.dataset)
    ReactDOM.render(<CustomerCareComponent {...props} />, element)
}