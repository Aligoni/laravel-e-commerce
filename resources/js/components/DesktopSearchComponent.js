import React, { useState, useEffect, useRef } from 'react'
import ReactDOM from 'react-dom'
import axios from 'axios'

export default function DesktopSearchComponent() {
    const axiosHandler = axios.CancelToken.source()

    const [active, setActive] = useState(false)
    const [searchText, setSearchText] = useState('')
    const [loading, setLoading] = useState(false)
    const inputRef = useRef(null)

    const searchClicked = () => {
        if (!active) {
            setActive(true)
            inputRef.current && inputRef.current.focus()

        } else {
            setActive(false)
            setSearchText('')
        }
    }

    const searchTextChange = async (e) => {
        loading && axiosHandler.cancel()

        setSearchText(e.target.value)
        setLoading(true)
        axios.get('api/products', {
            cancelToken: axiosHandler.token,
        }).then(response => {
            console.log(response)
            console.log(e.target.value)
            setLoading(false)
        }).catch(function (thrown) {
            if (axios.isCancel(thrown)) {

            } else {
                // handle error
            }
        });
    }

    return (
        <div className="hidden md:flex items-center">
            <div>
                <input
                    ref={inputRef}
                    type="text"
                    className={`${active ? 'activeInput' : ''}`}
                    placeholder="Start typing..."
                    value={searchText}
                    onChange={searchTextChange}
                />
            </div>
            {!active ?
                <i
                    onClick={searchClicked}
                    className="cursor-pointer material-icons ml-2 hover:text-blue-500"
                    style={{ fontSize: 36 }}>
                    search
                </i> :
                <p
                    onClick={searchClicked}
                    className="cursor-pointer text-2xl mx-2 text-gray-700 font-bold hover:text-blue-500">
                    X
                </p>
            }
        </div>
    )
}

if (document.getElementById('desktopSearch')) {
    ReactDOM.render(<DesktopSearchComponent />, document.getElementById('desktopSearch'));
}