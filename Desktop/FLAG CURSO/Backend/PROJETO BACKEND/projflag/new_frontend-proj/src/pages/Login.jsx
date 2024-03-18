import Header from "../components/Header";
import Footer from "../components/Footer";
import { Link, useNavigate } from "react-router-dom";
import { useState, useRef } from "react";
import { useStateContext } from "../contexts/ContextProvider";
import api from "../services/api.jsx";
import "../styles/index.css";

function Login() {
    const navigate = useNavigate();
    const emailRef = useRef();
    const passwordRef = useRef();
    const [errors, setErrors] = useState(null);

    const { setUser, setToken } = useStateContext();

    const onSubmit = (ev) => {
        ev.preventDefault();
        const payload = {
            email: emailRef.current.value,
            password: passwordRef.current.value,
        };
        setErrors(null);
        api.post("/login", payload)
            .then(({ data }) => {
                setUser(data.user);
                setToken(data.token);

                if (data.user.user_type === "patient") {
                    navigate("/cliente");
                } else if (data.user.user_type === "adm") {
                    navigate("/adm");
                } else if (data.user.user_type === "doctor") {
                    navigate("/doctors");
                }
            })

            .catch((err) => {
                const response = err.response;
                if (response && response.status === 422) {
                    if (response.data.errors) {
                        setErrors(response.data.errors);
                    } else {
                        setErrors({
                            email: [response.data.message],
                        });
                    }
                }
            });
    };

    return (
        <>
            <Header />
            <div className="mt-15 mb-2 px-6 flex flex-col items-center">
                <h1 className="text-3xl my-3.5">Log in</h1>
                <p>Enter your e-mail and password to log in.</p>
            </div>
            <div
                id="logon-container"
                className="w-full h-lvh mt-0 mb-auto flex items-center justify-center"
            >
                <section id="form">
                    <form
                        onSubmit={onSubmit}
                        className="w-full h-64 mt-0 mb-auto px-6 flex flex-col items-center justify-center bg-slate-500 rounded-3xl"
                    >
                        {errors && (
                            <div className="alert">
                                {Object.keys(errors).map((key) => (
                                    <p key={key}>{errors[key][0]}</p>
                                ))}
                            </div>
                        )}
                        <input
                            ref={emailRef}
                            placeholder="Type your e-mail"
                            type="email"
                            className="mb-5 px-2 rounded-3xl"
                        />
                        <input
                            ref={passwordRef}
                            placeholder="Type your password"
                            type="password"
                            className="mb-5 px-2 rounded-3xl"
                        />

                        <button
                            id="button"
                            type="submit"
                            className="mb-5 px-2 rounded-xl bg-slate-200"
                        >
                            Log in
                        </button>

                        <p>
                            Not registered
                            <Link to="/signup" className="text-rose-500 ml-2">
                                yet?
                            </Link>
                        </p>
                    </form>
                </section>
            </div>

            <Footer />
        </>
    );
}

export default Login;
