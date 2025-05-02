import React from 'react'
import Sidebar from "@/app/Application/Components/Sidebar"
import { MapPinIcon, PhoneIcon, ClockIcon } from "@heroicons/react/24/outline"
const Contact = () => {
  return (
    <>
      <aside>
        <Sidebar />
      </aside>

      <div className="flex flex-col items-center justify-center px-6 py-10 min-h-screen bg-white text-[#5f1a27] font-sans">
        
        <h1 className="text-5xl font-extrabold mb-2 bg-gradient-to-br from-[#F77A75] to-[#FE6690] text-transparent bg-clip-text drop-shadow-md">
          ₊˚｡⋆❆⋆｡˚₊
        </h1>
        <h1 className="text-4xl font-extrabold mb-10 bg-gradient-to-br from-[#F77A75] to-[#FE6690] text-transparent bg-clip-text drop-shadow-md">
          Contact Us
        </h1>

        <div className="bg-white 
                        border border-[#F77A75] rounded-[2rem] 
                        shadow-lg shadow-pink-200 p-8 w-full max-w-3xl space-y-6">

          <div className="flex items-center gap-4">
            <MapPinIcon className="h-8 w-8 text-[#D64560]" />
            <div>
              <h2 className="text-xl font-bold">Visit Us</h2>
              <p className="text-base">M.L. Quezon Highway, Lapu-Lapu City, Cebu</p>
            </div>
          </div>

          <div className="flex items-center gap-4">
            <PhoneIcon className="h-8 w-8 text-[#D64560]" />
            <div>
              <h2 className="text-xl font-bold">Call or Text</h2>
              <p className="text-base">+63 912 345 6789</p>
            </div>
          </div>

          <div className="flex items-center gap-4">
            <ClockIcon className="h-8 w-8 text-[#D64560]" />
            <div>
              <h2 className="text-xl font-bold">Open Hours</h2>
              <p className="text-base">Monday - Sunday | 10:00 AM - 7:00 PM</p>
            </div>
          </div>
        </div>
      </div>
    </>
  )
}

export default Contact
