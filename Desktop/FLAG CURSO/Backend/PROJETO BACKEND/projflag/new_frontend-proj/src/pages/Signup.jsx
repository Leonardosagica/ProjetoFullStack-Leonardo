import { Link, useNavigate } from "react-router-dom";
import { useRef, useState } from "react";
import { useStateContext } from "../contexts/ContextProvider";
import Header from "../components/Header";
import Footer from "../components/Footer";

import api from "../services/api.jsx";
import "../styles/index.css";
function Signup() {
    const navigate = useNavigate();
    const nameRef = useRef();
    const emailRef = useRef();
    const passwordRef = useRef();
    const confirmPasswordRef = useRef();
    const userTypeRef = useRef();
    const [errors, setErrors] = useState(null);

    const { setUser, setToken } = useStateContext();

    const onSubmit = (ev) => {
        ev.preventDefault();

        const payload = {
            name: nameRef.current.value,
            email: emailRef.current.value,
            password: passwordRef.current.value,
            password_confirmation: confirmPasswordRef.current.value,
            user_type: userTypeRef.current.value,
        };
        api.post("/signup", payload)
            .then(({ data }) => {
                setUser(data.user);
                setToken(data.token);
                navigate("/login");
            })
            .catch((err) => {
                const response = err.response;
                if (response && response.status === 422) {
                    setErrors(response.data.errors);
                }
            });
    };

    return (
        <>
            <Header />

            <div
                id="register-container"
                className="w-full h-lvh mt-0 mb-auto flex items-center justify-center"
            >
                <div id="content">
                    <section className="mb-5 px-6 flex flex-col items-center">
                        <h1 className="text-3xl my-3.5">Sign up</h1>
                        <p>
                            Here you can sign up and start to use the platform.
                        </p>

                        <Link to="/login">
                            I am already{" "}
                            <span className="font-semibold">registered</span>
                        </Link>
                    </section>

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
                            ref={nameRef}
                            placeholder="Your name"
                            className="mt-10 mb-5 px-2 rounded-3xl"
                        />

                        <input
                            ref={emailRef}
                            type="email"
                            placeholder="Your E-mail"
                            className="mb-5 px-2 rounded-3xl"
                        />

                        <input
                            ref={passwordRef}
                            placeholder="Type your password"
                            type="password"
                            className="mb-5 px-2 rounded-3xl"
                        />

                        <input
                            ref={confirmPasswordRef}
                            placeholder="Confirm your password"
                            type="password"
                            className="mb-5 px-2 rounded-3xl"
                        />
                        <select
                            ref={userTypeRef}
                            className="mb-5 px-2 rounded-3xl"
                            onChange={(e) =>
                                (userTypeRef.current.value = e.target.value)
                            }
                        >
                            <option value="adm">Administrative</option>
                            <option value="patient">Patient</option>
                            <option value="doctor">Doctor</option>
                        </select>

                        <button
                            type="submit"
                            className="mb-10 px-2 rounded-xl bg-slate-200"
                        >
                            Register
                        </button>
                    </form>
                </div>
            </div>

            <Footer />
        </>
    );
}

export default Signup;
