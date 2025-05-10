"use client";

import Sidebar from "@/app/Application/Components/Sidebar";

const ContactPage = () => {
  return (
    <>
      <Sidebar />
      <div className="ml-20 md:ml-64 p-8 min-h-screen font-['Playfair_Display'] transition-all duration-500 bg-white">
        <div className="rounded-lg p-8 md:p-12">

          <div className="grid md:grid-cols-2 gap-12">
            <div>
              <h2 className="text-3xl font-semibold text-[#FF6B81] mb-6">
                Get in Touch
              </h2>
              <p className="text-xl text-[#555555] mb-6 leading-relaxed">
                We`d love to hear from you! Whether you have a question,
                want to make a reservation, or just want to say hello,
                feel free to reach out.
              </p>

              <div className="mb-6">
                <h3 className="text-lg font-semibold text-[#707070] mb-2">
                  Location:
                </h3>
                <p className="text-xl text-[#555555]">
                  Opon Mercado, Lapu-Lapu City
                </p>
              </div>

              <div className="mb-6">
                <h3 className="text-lg font-semibold text-[#707070] mb-2">
                  Operating Hours:
                </h3>
                <p className="text-xl text-[#555555]">
                  Weekdays, 10:00 AM - 8:00 PM
                </p>
              </div>

              <div>
                <h3 className="text-2xl font-semibold text-[#707070] mt-3 mb-2">
                  Connect with us on Facebook:
                </h3>
                <a
                  href="https://www.facebook.com/share/1FWmjEu7Vb/"
                  target="_blank"
                  rel="noopener noreferrer"
                  className="text-[#FF6B81] hover:text-[#FF3366] transition-colors duration-200 font-semibold text-xl underline"
                >
                  Visit our Facebook Page
                </a>
              </div>
            </div>

            <div>
              <h2 className="text-3xl font-semibold text-[#FF6B81] mb-6">
                Reservations & Walk-ins
              </h2>
              <p className="text-xl text-[#555555] leading-relaxed">
                For a more seamless experience, we highly recommend contacting
                us through our Facebook page for reservations. This allows us
                to prepare for your visit and ensure you have the best
                possible time.
              </p>
              <p className="text-xl text-[#555555] mt-4 leading-relaxed">
                Of course, walk-ins are always welcome! We`ll do our best to
                accommodate you.
              </p>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default ContactPage;
