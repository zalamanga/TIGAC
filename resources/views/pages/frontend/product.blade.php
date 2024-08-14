@php
    $carousels = [
        [
            'id' => 1,
            'image' =>
                'https://s3-alpha-sig.figma.com/img/e707/44c9/e34390a232dffe89c77a30b1c03a2284?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=MAnQA4cNWdAX6UI9eb71p3klrHfZVJy~7DXfpwyuyOv9LpiPGQnsHoFR2dx6LD8Z5puWwhsW72-1GoHZvOboYKEzoJ-rusFSyCo~O4oi2bJAtwmMpKj1qN26sLmKqjmftClf-bVTAzrJOCHCWSCRlyROODdevfj8YH0D8gfVG7uRm7c31oahVfLfJn3QVL6tec0E2gIfNwpbQ8tYAJlDFoyLC7fVhA-mfLi116IvuuWDf5VRA83xauegsvW3DxvfFh7QZBNO03S2Ob-mo6MeLqBE9lRXREZltyYueHYbv5VlWlQMScNi4nxvdrJVp28BvL49nQSSZkSWwTxgWae7pg__',
        ],
        [
            'id' => 2,
            'image' =>
                'https://s3-alpha-sig.figma.com/img/8b0c/e3db/ef1b9dff59c93256adbd57732f4bcaf5?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Q-ueGNIBHntKMF0v9vzLO3x0wjQwUsw~BRHezN07AV~Htxn1TenJdHmmH8lsOm8zPyYdzXJbgb4jVGBiZhKD9Xq-VgUYG~E2nlNghQeMVmGIVAL9pDMg~lP9UFnZL-xCJKOPslYVvprpYzrk5d1e2ttxyv9YtZ7SOLGnTP577T63SHPbBu7NpPzEzGWQ42aRNy4aLCjEwPhlWHsHfVqhBFCI8gvWRhmCPGtGMWTEd7xBM19Ys7OZI42ipNkI0hcAMTY9TO2b00HECBqwIRfrXyZEoF4X3rdBOsQ4McdMnMD9s7SX7dBrZi6cXHFneQNAm8p4VkdPmaba1k40de3bhQ__',
        ],
        [
            'id' => 3,
            'image' =>
                'https://s3-alpha-sig.figma.com/img/2c26/a073/7594fbfa7cc95e6f33a0249bae2006a8?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=AZUKtvMBDvjvXw213AwDfDPanOzwn32q21Uur9MMNyv8nTwfTLoXzuW9LH7Q4lt2cmHzsvI4DcsFIV44Eq2O3tU8hAn9v3r9vi8jerP3CT4Ld6yqWqO5VDfxo7G7FwGPq12WJi2uUuSHqKSYmpNEWiT4~PaSSbG3cEk4UKfABAuSlcRaL2WB6~cDFKrn5o3ghyxv-W9~UcQdeNKW8TuX8TXvDRdDJvBepOBAt2Pb4WDXyoL8hwew-NmMWtPKAC-7qIAxhpxWGOQtGVULE3DL72LtTkRDOFJfDjnGBoC0vD~6-XtO~rKwGts~MNDdWqLhW6hKCOqH0kpO0AYXmd9MiA__',
        ],
    ];

    $products = [
        '1' => [
            [
                'name' => 'Melon Mystic',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/b4f8/cfdf/198571ae9bd2946549efe3d6377732ac?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=EFdM0DuxUFAGVjcP3APNkhXcO6edQjaRnQiDWdONtqm1ikidCOhvlDPDDtIqwXVYLIRPtgthdQozYYYi4NiM-6-H-Ze~0ZbZkgTFw42hGe7SNL-NnOTla0NU3PKZsT8dTKNJHVfAi444xHQO967Hx0cAj0kagu1FxMygmoW1Swzg1TJOo2YOxyDeigv7ZSJoO8P64xiZQQCAD8OmXxsAGXnIotkOeAbqOfVslouPk4zBchDf7eXNdvwR-BrzUollG6bQED8uXidYNY~-nKm9oTLpVI7x76Fi9Du7HMdfJZK~C9u~QQGH~ns7b~xblSu2Ue54Q3yHirFOC6reH8mESA__',
                'category' => 'Tigac Saltnic - Fruity Series',
            ],
            [
                'name' => 'JUICY SELECTION',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/357c/f150/caa46c95da8d27711eb7bcdf004f85e7?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QimE31Ddda1Fez-Wx-XYxnPzXFP8JoE0tqQ8u9UHuRIL-~DypELXuT52EgMMOvi234WHCY1YoblTlWbl6dsuZMFhqEmCELokwvQiYdh4jdUKpczgEzIM1qQ1oZJtcO7DznXqe3CTRcW-Cnze0OutGNZCDVrCE2RTg-GOYn0~h7TBEetaExJ9N1JLs-sASz~kQkAmjyl2b4CVsk81mhhqFxlpQSS1erLB1xYOt2-q7WQZXZJwZexvJzv0Zy8Fe3zgLhERknZTvsKTBiFJdD6UTinwnO7DNecF7RVoj55gjO1HeRlVngtBbi2YVcV6STCAekZtiTgdDoVPC-uJml5gbw__',
                'category' => 'Melon Madness',
            ],
            [
                'name' => 'TIGAC',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/b407/3156/5e5cc23a6a8dcb60f7f31071e58043b7?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fhDMSUdNJn6oHnOUr45FxzJMLT1ObUZ9aCeFFtSYsSEmN3Ld6z2Hk90KOmnEPoYCBbFceS27TvURgUU3OwzEeZoDMks86kMRVA1jrbe5nlB9MZjEu3Pm40kCazgzXzYF4WNmbUyIRJ3Q83fdHYXlsYmceY1Qf6A9KxKqp2e0WpFnCrkQ0aYs-GuZ2tjgxbJDP97~yRy3DPY9yL7JtVd86sa~l2SSJmZ4wpK~31GCZ1KLPvmbSGYfybQQe29i0ahQbB0LaG8yFaF2Egq1mamzjBB9ba3AKqRUn08QYoiwON~lKrl0xug9SrkpqzUsbR8ht-gWwMD~6RHGf8G0Gde-Dw__',
                'category' => 'Sando Cream Sandwich',
            ],
            [
                'name' => 'Tigac STIG Pod Kit',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/be1d/96d6/92de1e7a514aae6d50a009c8f880aa62?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=X-U6URkDAJSYWijj7T-cqiEe-2yzG-04kJS9AEDWaCpwoetlE9-AARO60v52pgCCkV0QYocXWeqTbA9V3VTRMLLExGo~hDMUzr8QVC43Q8XgIOFH2IkQO3ChOP0nv4ZRZWTZwq8AlXrJcybXNKYw932FFpDJqDzsbeLM7b07jVJgnewnHRcpkaIVRhGdSVIAYaBPWnZ5fmN~5lkjyGE~AYVnD3z9mG-sphSzYXVspsqPR-DRPvHM~wieYoN-UX48H5WNVgn6w2EsoWNxXUz79W-wN0udkhxKi3OmG6IUMmm0WEKOSqKFCO98K4um2vd76PnF3yBRo4lXvErynLc32g__',
                'category' => 'Pod Device',
            ],
        ],
        '2' => [
            [
                'name' => 'Melon Mystic',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/b4f8/cfdf/198571ae9bd2946549efe3d6377732ac?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=EFdM0DuxUFAGVjcP3APNkhXcO6edQjaRnQiDWdONtqm1ikidCOhvlDPDDtIqwXVYLIRPtgthdQozYYYi4NiM-6-H-Ze~0ZbZkgTFw42hGe7SNL-NnOTla0NU3PKZsT8dTKNJHVfAi444xHQO967Hx0cAj0kagu1FxMygmoW1Swzg1TJOo2YOxyDeigv7ZSJoO8P64xiZQQCAD8OmXxsAGXnIotkOeAbqOfVslouPk4zBchDf7eXNdvwR-BrzUollG6bQED8uXidYNY~-nKm9oTLpVI7x76Fi9Du7HMdfJZK~C9u~QQGH~ns7b~xblSu2Ue54Q3yHirFOC6reH8mESA__',
                'category' => 'Tigac Saltnic - Fruity Series',
            ],
            [
                'name' => 'JUICY SELECTION',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/357c/f150/caa46c95da8d27711eb7bcdf004f85e7?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QimE31Ddda1Fez-Wx-XYxnPzXFP8JoE0tqQ8u9UHuRIL-~DypELXuT52EgMMOvi234WHCY1YoblTlWbl6dsuZMFhqEmCELokwvQiYdh4jdUKpczgEzIM1qQ1oZJtcO7DznXqe3CTRcW-Cnze0OutGNZCDVrCE2RTg-GOYn0~h7TBEetaExJ9N1JLs-sASz~kQkAmjyl2b4CVsk81mhhqFxlpQSS1erLB1xYOt2-q7WQZXZJwZexvJzv0Zy8Fe3zgLhERknZTvsKTBiFJdD6UTinwnO7DNecF7RVoj55gjO1HeRlVngtBbi2YVcV6STCAekZtiTgdDoVPC-uJml5gbw__',
                'category' => 'Melon Madness',
            ],
            [
                'name' => 'TIGAC',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/b407/3156/5e5cc23a6a8dcb60f7f31071e58043b7?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fhDMSUdNJn6oHnOUr45FxzJMLT1ObUZ9aCeFFtSYsSEmN3Ld6z2Hk90KOmnEPoYCBbFceS27TvURgUU3OwzEeZoDMks86kMRVA1jrbe5nlB9MZjEu3Pm40kCazgzXzYF4WNmbUyIRJ3Q83fdHYXlsYmceY1Qf6A9KxKqp2e0WpFnCrkQ0aYs-GuZ2tjgxbJDP97~yRy3DPY9yL7JtVd86sa~l2SSJmZ4wpK~31GCZ1KLPvmbSGYfybQQe29i0ahQbB0LaG8yFaF2Egq1mamzjBB9ba3AKqRUn08QYoiwON~lKrl0xug9SrkpqzUsbR8ht-gWwMD~6RHGf8G0Gde-Dw__',
                'category' => 'Sando Cream Sandwich',
            ],
            [
                'name' => 'Tigac STIG Pod Kit',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/be1d/96d6/92de1e7a514aae6d50a009c8f880aa62?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=X-U6URkDAJSYWijj7T-cqiEe-2yzG-04kJS9AEDWaCpwoetlE9-AARO60v52pgCCkV0QYocXWeqTbA9V3VTRMLLExGo~hDMUzr8QVC43Q8XgIOFH2IkQO3ChOP0nv4ZRZWTZwq8AlXrJcybXNKYw932FFpDJqDzsbeLM7b07jVJgnewnHRcpkaIVRhGdSVIAYaBPWnZ5fmN~5lkjyGE~AYVnD3z9mG-sphSzYXVspsqPR-DRPvHM~wieYoN-UX48H5WNVgn6w2EsoWNxXUz79W-wN0udkhxKi3OmG6IUMmm0WEKOSqKFCO98K4um2vd76PnF3yBRo4lXvErynLc32g__',
                'category' => 'Pod Device',
            ],
        ],
        '3' => [
            [
                'name' => 'Melon Mystic',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/b4f8/cfdf/198571ae9bd2946549efe3d6377732ac?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=EFdM0DuxUFAGVjcP3APNkhXcO6edQjaRnQiDWdONtqm1ikidCOhvlDPDDtIqwXVYLIRPtgthdQozYYYi4NiM-6-H-Ze~0ZbZkgTFw42hGe7SNL-NnOTla0NU3PKZsT8dTKNJHVfAi444xHQO967Hx0cAj0kagu1FxMygmoW1Swzg1TJOo2YOxyDeigv7ZSJoO8P64xiZQQCAD8OmXxsAGXnIotkOeAbqOfVslouPk4zBchDf7eXNdvwR-BrzUollG6bQED8uXidYNY~-nKm9oTLpVI7x76Fi9Du7HMdfJZK~C9u~QQGH~ns7b~xblSu2Ue54Q3yHirFOC6reH8mESA__',
                'category' => 'Tigac Saltnic - Fruity Series',
            ],
            [
                'name' => 'JUICY SELECTION',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/357c/f150/caa46c95da8d27711eb7bcdf004f85e7?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QimE31Ddda1Fez-Wx-XYxnPzXFP8JoE0tqQ8u9UHuRIL-~DypELXuT52EgMMOvi234WHCY1YoblTlWbl6dsuZMFhqEmCELokwvQiYdh4jdUKpczgEzIM1qQ1oZJtcO7DznXqe3CTRcW-Cnze0OutGNZCDVrCE2RTg-GOYn0~h7TBEetaExJ9N1JLs-sASz~kQkAmjyl2b4CVsk81mhhqFxlpQSS1erLB1xYOt2-q7WQZXZJwZexvJzv0Zy8Fe3zgLhERknZTvsKTBiFJdD6UTinwnO7DNecF7RVoj55gjO1HeRlVngtBbi2YVcV6STCAekZtiTgdDoVPC-uJml5gbw__',
                'category' => 'Melon Madness',
            ],
            [
                'name' => 'TIGAC',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/b407/3156/5e5cc23a6a8dcb60f7f31071e58043b7?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=fhDMSUdNJn6oHnOUr45FxzJMLT1ObUZ9aCeFFtSYsSEmN3Ld6z2Hk90KOmnEPoYCBbFceS27TvURgUU3OwzEeZoDMks86kMRVA1jrbe5nlB9MZjEu3Pm40kCazgzXzYF4WNmbUyIRJ3Q83fdHYXlsYmceY1Qf6A9KxKqp2e0WpFnCrkQ0aYs-GuZ2tjgxbJDP97~yRy3DPY9yL7JtVd86sa~l2SSJmZ4wpK~31GCZ1KLPvmbSGYfybQQe29i0ahQbB0LaG8yFaF2Egq1mamzjBB9ba3AKqRUn08QYoiwON~lKrl0xug9SrkpqzUsbR8ht-gWwMD~6RHGf8G0Gde-Dw__',
                'category' => 'Sando Cream Sandwich',
            ],
            [
                'name' => 'Tigac STIG Pod Kit',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/be1d/96d6/92de1e7a514aae6d50a009c8f880aa62?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=X-U6URkDAJSYWijj7T-cqiEe-2yzG-04kJS9AEDWaCpwoetlE9-AARO60v52pgCCkV0QYocXWeqTbA9V3VTRMLLExGo~hDMUzr8QVC43Q8XgIOFH2IkQO3ChOP0nv4ZRZWTZwq8AlXrJcybXNKYw932FFpDJqDzsbeLM7b07jVJgnewnHRcpkaIVRhGdSVIAYaBPWnZ5fmN~5lkjyGE~AYVnD3z9mG-sphSzYXVspsqPR-DRPvHM~wieYoN-UX48H5WNVgn6w2EsoWNxXUz79W-wN0udkhxKi3OmG6IUMmm0WEKOSqKFCO98K4um2vd76PnF3yBRo4lXvErynLc32g__',
                'category' => 'Pod Device',
            ],
        ],
    ];
    $products_collaborations = [
        '1' => [
            [
                'name' => 'Electra Quinn',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/bf28/5f1c/6c1daf23e05e6b14117c36d5f53f6392?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QCSmIMjKYrD1q35nhjp6rs2ymEMZoOStDLRhsBHuQE9cwey4DkMeSGM-cowRmscjGbICuPKgXWcUCpRaEpg8KLl1UFG9bWKPMFTy7oeSqJNJ2t05qVIwx-zIpvTok3Gz0xJkDhSQYdoBf05fD-EUeV6HJMeod9KCDuBEntWpVtSc~7kcjJ3CGAAqXVF5Veedzs9i0QURpZYCeGZIDPUsIwW1t6w7hoUvPz8RjhheyIqInl21V9gP9axr7O2-eFoy-sh2qetYigIDibqT-SAukbmTiBzBrFc7s1VtQEzvZYy9Co7xo5GSRg7Nl790~l8BeNcofJAKGbzKVoNe9~Ullg__',
                'category' => 'Creme & Crime - Freebase',
            ],
            [
                'name' => 'Orion Shadow',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/bee3/9dec/ae969537ba3cdb886aa034363c331ff4?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=c6X6~jKUZJdXTHw4jcNO0XeM41HNO9jBKhCJ-gdM5mFmzkRh6VyYQPYcvwmag1cqLL~5RGxoH-LsIieQv1bw07tl0yYINeB1wcXwIFA10xOnDB2jfZj2sJpO45k8ZMhidaz-tv7J1rMvR5X8MSUw6MGz2F2VHeJHe0v4B9a8yZzWXwhhXK0thzrs3EyiSuez2vTh65EAK~cVpi6W9eB~tOtHCyFLT7BV-X~7x1TMvG1~uXdhgHUhxWnKEAXQGaOcAdPZ0INSBj9skH30sU6Xc2M6IeN1wPe7fwBp6JMHuu~TNWvhYIvb5EBQCmLu4bWLx6DWEUDMP4iPWvcoKp8cTQ__',
                'category' => 'Creme & Crime - Freebase',
            ],
            [
                'name' => 'Cospic Strawberry Fizz',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/f269/eeb5/e4d6dee3cfc2a4f04c1725e8450c720f?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QskngmfQyktG1wWvpjIz70TiZUuhl1lmzZjWZepNGS99QkyWg7kSflhrWnVXan7CVWlMwq-wqAxLTwe2hGkhued6kKOCYz0209vAhpnWAMs8T4fhJB6g7zryalbanTCCLXtrD7OHX0tTnvDX5K33IkCzZCTHmUJLbhcQl86ZW0eV0nigkm7E0Y6mGqli7U0rhJ9LC87-Eb8KopbfJLRVSEhmeNAkEWzcNHZl33ssHZCt-qP4pvfIABkI0E5gHCId-df3Mh4Jgy6DKgq7oWdopyZvG7QCwpYnIlo9PyHxaxUJgp56TmW-fNEGQySiXwZMwg~ImPs4anltVe2XLGGfmA__',
                'category' => 'Pocket Rockid - Freebase',
            ],
            [
                'name' => 'Banana Space Cream',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/483c/2c99/d08b33d1c0ff0c326ca85735dfbc3ac4?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Ywf7lhhrX-Dfv97W6-7Wd5AZp-tjf8pBQuI3pDVZvxwFZjIPisMqUlX3R1ml7kX~dncLcHAhA8Mm6RU4n5qmdhNPw2sMgovqG-OdkkuGbG7RHWqj5N3Bhi4s~FHBeFdWYkEB7tThjASJzdH26m9~BJ9WXeh3SA6kR3Incr0XV9A-PrjNW-33HVQuCX3NZCsae-V~sdMWZ~NiuldBEcRsleL1QJjimOsjZCzxToYeRheXofEuGpISttge5ykWV2vt1pSzvBn~HSlc0Kelu1ScxtNpzhxyS~CnxcxJ-LRv4QnucTjjwmlEwbt~XeUSUtGY-4UpsK5uiBXwFYPJrwCz3A__',
                'category' => 'Pocket Rockid - Freebase',
            ],
        ],
        '2' => [
            [
                'name' => 'Electra Quinn',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/bf28/5f1c/6c1daf23e05e6b14117c36d5f53f6392?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QCSmIMjKYrD1q35nhjp6rs2ymEMZoOStDLRhsBHuQE9cwey4DkMeSGM-cowRmscjGbICuPKgXWcUCpRaEpg8KLl1UFG9bWKPMFTy7oeSqJNJ2t05qVIwx-zIpvTok3Gz0xJkDhSQYdoBf05fD-EUeV6HJMeod9KCDuBEntWpVtSc~7kcjJ3CGAAqXVF5Veedzs9i0QURpZYCeGZIDPUsIwW1t6w7hoUvPz8RjhheyIqInl21V9gP9axr7O2-eFoy-sh2qetYigIDibqT-SAukbmTiBzBrFc7s1VtQEzvZYy9Co7xo5GSRg7Nl790~l8BeNcofJAKGbzKVoNe9~Ullg__',
                'category' => 'Creme & Crime - Freebase',
            ],
            [
                'name' => 'Orion Shadow',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/bee3/9dec/ae969537ba3cdb886aa034363c331ff4?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=c6X6~jKUZJdXTHw4jcNO0XeM41HNO9jBKhCJ-gdM5mFmzkRh6VyYQPYcvwmag1cqLL~5RGxoH-LsIieQv1bw07tl0yYINeB1wcXwIFA10xOnDB2jfZj2sJpO45k8ZMhidaz-tv7J1rMvR5X8MSUw6MGz2F2VHeJHe0v4B9a8yZzWXwhhXK0thzrs3EyiSuez2vTh65EAK~cVpi6W9eB~tOtHCyFLT7BV-X~7x1TMvG1~uXdhgHUhxWnKEAXQGaOcAdPZ0INSBj9skH30sU6Xc2M6IeN1wPe7fwBp6JMHuu~TNWvhYIvb5EBQCmLu4bWLx6DWEUDMP4iPWvcoKp8cTQ__',
                'category' => 'Creme & Crime - Freebase',
            ],
            [
                'name' => 'Cospic Strawberry Fizz',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/f269/eeb5/e4d6dee3cfc2a4f04c1725e8450c720f?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QskngmfQyktG1wWvpjIz70TiZUuhl1lmzZjWZepNGS99QkyWg7kSflhrWnVXan7CVWlMwq-wqAxLTwe2hGkhued6kKOCYz0209vAhpnWAMs8T4fhJB6g7zryalbanTCCLXtrD7OHX0tTnvDX5K33IkCzZCTHmUJLbhcQl86ZW0eV0nigkm7E0Y6mGqli7U0rhJ9LC87-Eb8KopbfJLRVSEhmeNAkEWzcNHZl33ssHZCt-qP4pvfIABkI0E5gHCId-df3Mh4Jgy6DKgq7oWdopyZvG7QCwpYnIlo9PyHxaxUJgp56TmW-fNEGQySiXwZMwg~ImPs4anltVe2XLGGfmA__',
                'category' => 'Pocket Rockid - Freebase',
            ],
            [
                'name' => 'Banana Space Cream',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/483c/2c99/d08b33d1c0ff0c326ca85735dfbc3ac4?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Ywf7lhhrX-Dfv97W6-7Wd5AZp-tjf8pBQuI3pDVZvxwFZjIPisMqUlX3R1ml7kX~dncLcHAhA8Mm6RU4n5qmdhNPw2sMgovqG-OdkkuGbG7RHWqj5N3Bhi4s~FHBeFdWYkEB7tThjASJzdH26m9~BJ9WXeh3SA6kR3Incr0XV9A-PrjNW-33HVQuCX3NZCsae-V~sdMWZ~NiuldBEcRsleL1QJjimOsjZCzxToYeRheXofEuGpISttge5ykWV2vt1pSzvBn~HSlc0Kelu1ScxtNpzhxyS~CnxcxJ-LRv4QnucTjjwmlEwbt~XeUSUtGY-4UpsK5uiBXwFYPJrwCz3A__',
                'category' => 'Pocket Rockid - Freebase',
            ],
        ],
        '3' => [
            [
                'name' => 'Electra Quinn',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/bf28/5f1c/6c1daf23e05e6b14117c36d5f53f6392?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QCSmIMjKYrD1q35nhjp6rs2ymEMZoOStDLRhsBHuQE9cwey4DkMeSGM-cowRmscjGbICuPKgXWcUCpRaEpg8KLl1UFG9bWKPMFTy7oeSqJNJ2t05qVIwx-zIpvTok3Gz0xJkDhSQYdoBf05fD-EUeV6HJMeod9KCDuBEntWpVtSc~7kcjJ3CGAAqXVF5Veedzs9i0QURpZYCeGZIDPUsIwW1t6w7hoUvPz8RjhheyIqInl21V9gP9axr7O2-eFoy-sh2qetYigIDibqT-SAukbmTiBzBrFc7s1VtQEzvZYy9Co7xo5GSRg7Nl790~l8BeNcofJAKGbzKVoNe9~Ullg__',
                'category' => 'Creme & Crime - Freebase',
            ],
            [
                'name' => 'Orion Shadow',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/bee3/9dec/ae969537ba3cdb886aa034363c331ff4?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=c6X6~jKUZJdXTHw4jcNO0XeM41HNO9jBKhCJ-gdM5mFmzkRh6VyYQPYcvwmag1cqLL~5RGxoH-LsIieQv1bw07tl0yYINeB1wcXwIFA10xOnDB2jfZj2sJpO45k8ZMhidaz-tv7J1rMvR5X8MSUw6MGz2F2VHeJHe0v4B9a8yZzWXwhhXK0thzrs3EyiSuez2vTh65EAK~cVpi6W9eB~tOtHCyFLT7BV-X~7x1TMvG1~uXdhgHUhxWnKEAXQGaOcAdPZ0INSBj9skH30sU6Xc2M6IeN1wPe7fwBp6JMHuu~TNWvhYIvb5EBQCmLu4bWLx6DWEUDMP4iPWvcoKp8cTQ__',
                'category' => 'Creme & Crime - Freebase',
            ],
            [
                'name' => 'Cospic Strawberry Fizz',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/f269/eeb5/e4d6dee3cfc2a4f04c1725e8450c720f?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=QskngmfQyktG1wWvpjIz70TiZUuhl1lmzZjWZepNGS99QkyWg7kSflhrWnVXan7CVWlMwq-wqAxLTwe2hGkhued6kKOCYz0209vAhpnWAMs8T4fhJB6g7zryalbanTCCLXtrD7OHX0tTnvDX5K33IkCzZCTHmUJLbhcQl86ZW0eV0nigkm7E0Y6mGqli7U0rhJ9LC87-Eb8KopbfJLRVSEhmeNAkEWzcNHZl33ssHZCt-qP4pvfIABkI0E5gHCId-df3Mh4Jgy6DKgq7oWdopyZvG7QCwpYnIlo9PyHxaxUJgp56TmW-fNEGQySiXwZMwg~ImPs4anltVe2XLGGfmA__',
                'category' => 'Pocket Rockid - Freebase',
            ],
            [
                'name' => 'Banana Space Cream',
                'image' =>
                    'https://s3-alpha-sig.figma.com/img/483c/2c99/d08b33d1c0ff0c326ca85735dfbc3ac4?Expires=1724630400&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Ywf7lhhrX-Dfv97W6-7Wd5AZp-tjf8pBQuI3pDVZvxwFZjIPisMqUlX3R1ml7kX~dncLcHAhA8Mm6RU4n5qmdhNPw2sMgovqG-OdkkuGbG7RHWqj5N3Bhi4s~FHBeFdWYkEB7tThjASJzdH26m9~BJ9WXeh3SA6kR3Incr0XV9A-PrjNW-33HVQuCX3NZCsae-V~sdMWZ~NiuldBEcRsleL1QJjimOsjZCzxToYeRheXofEuGpISttge5ykWV2vt1pSzvBn~HSlc0Kelu1ScxtNpzhxyS~CnxcxJ-LRv4QnucTjjwmlEwbt~XeUSUtGY-4UpsK5uiBXwFYPJrwCz3A__',
                'category' => 'Pocket Rockid - Freebase',
            ],
        ],
    ];
@endphp

@extends('layouts.frontend.main')
@section('content')
    {{-- Section 1 start --}}
    <section>
        <div id="carouselBannerProduct" class="carousel slide mb-4">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselBannerProduct" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselBannerProduct" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselBannerProduct" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                @foreach ($carousels as $carousel)
                    <div class="carousel-item carousel-item-banner {{ $loop->index == 0 ? 'active' : '' }}">
                        <img src="{{ $carousel['image'] }}" class="d-block w-100" alt="carousel-{{ $carousel['id'] }}">
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselBannerProduct"
                data-bs-slide="prev">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="64" viewBox="0 0 44 64" fill="none">
                    <g filter="url(#filter0_d_2665_239)">
                        <path d="M36 4L12 28L36 52" stroke="white" stroke-opacity="0.5" stroke-width="10"
                            shape-rendering="crispEdges" />
                    </g>
                    <defs>
                        <filter id="filter0_d_2665_239" x="0.928955" y="0.464478" width="42.6066" height="63.071"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="4" />
                            <feGaussianBlur stdDeviation="2" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2665_239" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2665_239" result="shape" />
                        </filter>
                    </defs>
                </svg> <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselBannerProduct"
                data-bs-slide="next">
                <svg xmlns="http://www.w3.org/2000/svg" width="44" height="64" viewBox="0 0 44 64" fill="none">
                    <g filter="url(#filter0_d_2665_237)">
                        <path d="M8 4L32 28L8 52" stroke="white" stroke-opacity="0.5" stroke-width="10"
                            shape-rendering="crispEdges" />
                    </g>
                    <defs>
                        <filter id="filter0_d_2665_237" x="0.464478" y="0.464478" width="42.6066" height="63.071"
                            filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                            <feFlood flood-opacity="0" result="BackgroundImageFix" />
                            <feColorMatrix in="SourceAlpha" type="matrix"
                                values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
                            <feOffset dy="4" />
                            <feGaussianBlur stdDeviation="2" />
                            <feComposite in2="hardAlpha" operator="out" />
                            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
                            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2665_237" />
                            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2665_237" result="shape" />
                        </filter>
                    </defs>
                </svg> <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
    {{-- Section 1 end --}}

    {{-- Section 2 start --}}
    <section>

        <div class="container pb-3 pb-md-4 py-lg-5">
            <h1 class="fw-semibold text-center mb-3 mb-lg-5 tagline-lg">This is our <span
                    class="text-capitalize text-ogg fw-semibold fst-italic lh-sm">masterpiece</span>, combining experience
                &
                quality.
            </h1>
            <div class="mb-3">
                <img src="{{ asset('images/logo-3.png') }}" alt="Logo" class="img-fluid mb-4 img-logo" />

                <div id="carouselProduct" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($products as $no => $product)
                            <div class="carousel-item carousel-item-product {{ $loop->index == 0 ? 'active' : '' }}">
                                <div class="d-flex align-items-center justify-content-around flex-nowrap gap-2 gap-md-3">
                                    @foreach ($product as $item)
                                        <a href="#"
                                            class="border rounded-4 overflow-hidden card-product-item position-relative d-flex align-items-center justify-content-center shadow-sm">
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                                class="img-fluid transition-all">
                                            <div
                                                class="bg-body-secondary text-secondary position-absolute bottom-0 w-full p-3">
                                                <h3 class="product-title fw-semibold m-0 text-truncate">{{ $item['name'] }}
                                                </h3>
                                                <span class="d-block fs-7 text-truncate">{{ $item['category'] }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev opacity-100 justify-content-start btn-arrow-product-prev"
                        type="button" data-bs-target="#carouselProduct" data-bs-slide="prev">
                        <span
                            class="bg-black d-flex align-items-center justify-content-center text-white btn-arrow-product rounded-circle p-lg-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <g clip-path="url(#clip0_2271_1118)">
                                    <path
                                        d="M7.828 13L13.192 18.364L11.778 19.778L4 12L11.778 4.22195L13.192 5.63595L7.828 11L20 11V13L7.828 13Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2271_1118">
                                        <rect width="24" height="24" fill="white"
                                            transform="matrix(-1 0 0 -1 24 24)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next opacity-100 justify-content-end btn-arrow-product-next"
                        type="button" data-bs-target="#carouselProduct" data-bs-slide="next">
                        <span
                            class="bg-black d-flex align-items-center justify-content-center text-white btn-arrow-product rounded-circle p-lg-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <g clip-path="url(#clip0_2271_1113)">
                                    <path
                                        d="M16.172 11L10.808 5.63605L12.222 4.22205L20 12L12.222 19.778L10.808 18.364L16.172 13H4V11H16.172Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2271_1113">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 2 end --}}

    {{-- Section 3 start --}}
    <section>
        <div class="container pb-2 pb-md-3 py-lg-5 mb-5">
            <div class="mb-3">
                <img src="{{ asset('images/new/logo-tcall.png') }}" alt="Logo-tcall" class="img-fluid mb-4"
                    width="300" />

                <div id="carouselProductCollaboration" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($products_collaborations as $no => $product)
                            <div class="carousel-item carousel-item-product {{ $loop->index == 0 ? 'active' : '' }}">
                                <div class="d-flex align-items-center justify-content-around flex-nowrap gap-2 gap-md-3">
                                    @foreach ($product as $item)
                                        <a href="#"
                                            class="border rounded-4 overflow-hidden card-product-item position-relative d-flex align-items-center justify-content-center shadow-sm">
                                            <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                                class="img-fluid transition-all">
                                            <div
                                                class="bg-body-secondary text-secondary position-absolute bottom-0 w-full p-3">
                                                <h3 class="product-title fw-semibold m-0 text-truncate">
                                                    {{ $item['name'] }}</h3>
                                                <span class="d-block fs-7 text-truncate">{{ $item['category'] }}</span>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev opacity-100 justify-content-start btn-arrow-product-prev"
                        type="button" data-bs-target="#carouselProductCollaboration" data-bs-slide="prev">
                        <span
                            class="bg-black d-flex align-items-center justify-content-center text-white btn-arrow-product rounded-circle p-lg-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <g clip-path="url(#clip0_2271_1118)">
                                    <path
                                        d="M7.828 13L13.192 18.364L11.778 19.778L4 12L11.778 4.22195L13.192 5.63595L7.828 11L20 11V13L7.828 13Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2271_1118">
                                        <rect width="24" height="24" fill="white"
                                            transform="matrix(-1 0 0 -1 24 24)" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next opacity-100 justify-content-end btn-arrow-product-next"
                        type="button" data-bs-target="#carouselProductCollaboration" data-bs-slide="next">
                        <span
                            class="bg-black d-flex align-items-center justify-content-center text-white btn-arrow-product rounded-circle p-lg-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <g clip-path="url(#clip0_2271_1113)">
                                    <path
                                        d="M16.172 11L10.808 5.63605L12.222 4.22205L20 12L12.222 19.778L10.808 18.364L16.172 13H4V11H16.172Z"
                                        fill="white" />
                                </g>
                                <defs>
                                    <clipPath id="clip0_2271_1113">
                                        <rect width="24" height="24" fill="white" />
                                    </clipPath>
                                </defs>
                            </svg>
                        </span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
    {{-- Section 3 end --}}
@endsection
