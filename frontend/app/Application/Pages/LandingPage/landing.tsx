"use client";
import styles from "./LandingPageStyle/landingPage.module.css";
import Image from "next/image";


// interface TProductProps {
// Define the properties of your product object here
// id: number;
// name: string;
//  
// }

function LandingPage() {
  // const [product, setProduct] = useState<TProductProps[]>([]);

  // useEffect(() => {
  //   const fetchData = async () => {
  //     try {
  //       const response = await fetch("http://127.0.0.1:8000/api/products");

  //       if (!response.ok) {
  //         throw new Error(`Failed to Fetch ${response.status}`);
  //       }

  //       const data = await response.json();
  //       setProduct(data.data);
  //       console.log(data.data);
  //     } catch (error) {
  //       console.error("Error fetching products:", error);
  //       // Optionally set an error state to display a message to the user
  //     }
  //   };

  //   fetchData();
  // }, []);

  return (
    <>
      <div className="text-white min-h-screen font-raleway overflow-x-hidden bg-white">
        <header className="flex items-center justify-between px-4 py-6 md:px-8 lg:px-16">
          <div className="flex items-center">
          <Image
            src="/img/oop_logo.png"
            alt="Logo"
            width={100}  
            height={80}  
            className="h-auto" 
          />
          </div>
          {/* <nav className="flex space-x-4 sm:space-x-6 text-sm sm:text-base font-medium">
            <a href="#catalog" className="text-pink-500 hover:text-[#F77062] transition-colors duration-200">Catalog</a>
            <a href="#about" className="text-pink-500 hover:text-[#F77062] transition-colors duration-200">About</a>
            <a href="#contact" className="text-pink-500 hover:text-[#F77062] transition-colors duration-200">Contact</a>
          </nav> */}
        </header>

        <section className="flex flex-col-reverse lg:flex-row items-center justify-between max-w-7xl mx-auto px-4 sm:px-8 lg:px-16 py-12 lg:py-16 gap-y-6">
          <div className="w-full lg:w-1/2 space-y-6 sm:space-y-8 text-center lg:text-left">
            <h1 className="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-black leading-tight">
              <div className={`text-6xl font-extrabold ${styles.gradientText}`}>
                Mary`s Ice Scramble&amp;Snack Bites
              </div>
            </h1>
            <p className="text-base sm:text-lg md:text-xl text-gray-600 leading-relaxed max-w-prose mx-auto lg:mx-0">
              Legend whispers of a taste that rewrites happiness. They say it’s the sprinkle that changes everything.
            </p>
            <div className="inline-block p-0.5 rounded-full bg-gradient-to-r from-[#FE5196] to-[#F77062] transition-all duration-300 hover:from-[#F77062] hover:to-[#FE5196]">
              <a
                href="/Application/Pages/MainPage"
                className="block px-6 sm:px-8 py-3 sm:py-4 rounded-full bg-white hover:bg-transparent text-sm sm:text-base md:text-lg font-semibold text-[#F77062] hover:text-white transform hover:scale-105 transition duration-300"
              >
                View More
              </a>
            </div>
          </div>
          <Image
            src="/img/Strawberry.png"
            alt="Logo"
            width={300}  
            height={300}  
            className="h-auto" 
          />
        </section>
      </div>
    </>
  );
}

export default LandingPage;