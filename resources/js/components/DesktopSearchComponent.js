import React, { useState, useEffect, useRef } from 'react'
import ReactDOM from 'react-dom'

const inputClass = 'w-60 ml-3 transition-transform'
export default function DesktopSearchComponent() {
    const [active, setActive] = useState(false)
    const inputRef = useRef(null)

    const searchClicked = () => {
        if (!active) {
            setActive(true)
            inputRef.current && inputRef.current.focus()

        } else {
            setActive(false)
        }
    }

    return (
        <div className="hidden md:flex items-center">
            <div>
                <input ref={inputRef} type="text" className={`${active ? 'activeInput' : ''}`} />
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