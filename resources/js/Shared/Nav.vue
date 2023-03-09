<template>
    <nav class="ml-6">
        <ul class="flex space-x-6 list-inside">
            <li>
                <NavLink
                    href="/"
                    :active="$page.component.startsWith('Home')">Home
                </NavLink>
            </li>
            <li>
                <NavLink
                    href="/brands"
                    :active="$page.component.startsWith('Brand')">Brands
                </NavLink>
            </li>
            <li>
                <NavLink
                    href="/car-models"
                    :active="$page.component.startsWith('CarModel')">Car Models
                </NavLink>
            </li>

            <li>
                <NavLink
                    href="/product-categories"
                    :active="$page.component.startsWith('ProductCategory')">Product Categories
                </NavLink>
            </li>
            <li>
                <NavLink
                    href="/users"
                    :active="$page.component.startsWith('User')">Users
                </NavLink>
            </li>
            <li>
                <NavLink
                    href="/logout"
                    method="post"
                    as="button" >
                    Logout
                </NavLink>
            </li>
        </ul>
    </nav>
</template>

<script>
import NavLink from "@/Shared/NavLink.vue";

export default {
    components: {
        NavLink,
    }
}
</script>
