import Header from "../components/Header";
import Footer from "../components/Footer";
import "../styles/index.css";

function Home() {
    return (
        <>
            <Header />

            <main id="main">
                <div className="h-1/4 bg-slate-400 flex justify-center">
                    <div id="maincontainer" className="">
                        <img
                            src="https://st2.depositphotos.com/3889193/8015/i/450/depositphotos_80152446-stock-photo-smiling-female-doctor-holding-medical.jpg"
                            alt="banner-img"
                            className="w-fit h-35"
                        />
                        <div>
                            <button className="bg-blue-500 text-white font-bold w-fit mb-4 mt-2">
                                make an appointment!
                            </button>
                        </div>
                    </div>
                </div>
                <section className="h-44 bg-slate-200 flex justify-center">
                    <div>
                        <h1>Know our services!</h1>
                    </div>
                </section>
                <section className="h-44 bg-slate-400 flex justify-center">
                    <div>
                        <h1>Lateste news</h1>
                    </div>
                </section>
                <section className="h-44 bg-slate-200 flex justify-center">
                    <div>
                        <h1>Our partners</h1>
                    </div>
                </section>
            </main>

            <Footer />
        </>
    );
}

export default Home;
